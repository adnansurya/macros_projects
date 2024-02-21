import cv2
import numpy as np
import serial

# Inisialisasi koneksi serial dengan Arduino
ser = serial.Serial('COM7', 9600, timeout=0.1)

# Load YOLO
net = cv2.dnn.readNet("yolov4.weights", "yolov4.cfg")
with open("coco2.names", "r") as f:
    classes = [line.strip() for line in f.readlines()]
layer_names = net.getLayerNames()
output_layers = net.getUnconnectedOutLayersNames()

# Initialize webcam
cap = cv2.VideoCapture(0) # Menggunakan nomor 0 untuk webcam default

while True:
    ret, frame = cap.read()
    height, width, channels = frame.shape

    # Detecting objects
    blob = cv2.dnn.blobFromImage(frame, 0.00392, (416, 416), (0, 0, 0), True, crop=False)
    net.setInput(blob)
    outs = net.forward(output_layers)

    # Showing information on the screen
    class_ids = []
    confidences = []
    boxes = []
    for out in outs:
        for detection in out:
            scores = detection[5:]
            class_id = np.argmax(scores)
            confidence = scores[class_id]
            if confidence > 0.5:
                # Object detected
                center_x = int(detection[0] * width)
                center_y = int(detection[1] * height)
                w = int(detection[2] * width)
                h = int(detection[3] * height)
                # Rectangle coordinates
                x = int(center_x - w / 2)
                y = int(center_y - h / 2)
                boxes.append([x, y, w, h])
                confidences.append(float(confidence))
                class_ids.append(class_id)

    indexes = cv2.dnn.NMSBoxes(boxes, confidences, 0.5, 0.4)

    font = cv2.FONT_HERSHEY_PLAIN
    colors = np.random.uniform(0, 255, size=(len(classes), 3))
    
    # Flag to check if any object is detected
    object_detected = False

    for i in range(len(boxes)):
        if i in indexes:
            x, y, w, h = boxes[i]
            label = str(classes[class_ids[i]])
            color = colors[class_ids[i]]
            
            if label == "Plastic" or label == "Metal":
                # Mengirim koordinat pusat objek ke Arduino
                x_center = (x + w // 2) * 180 // width
                y_center = (y + h // 2) * 180 // height
                ser.write(f"{x_center},{y_center}\n".encode())
                object_detected = True
                
            color = (255, 255, 255)  # Putih untuk label
            cv2.putText(frame, label, (x, y - 10), font, 1, color, 2, cv2.LINE_AA)
            cv2.rectangle(frame, (x, y), (x + w, y + h), color, 2)
            cv2.putText(frame, label, (x, y + 30), font, 3, color, 3)

    # Jika tidak ada objek yang terdeteksi, kirim sinyal "Not detected"
    if not object_detected:
        ser.write("Not detected".encode())

    cv2.imshow("Webcam", frame)
    key = cv2.waitKey(1)
    if key == 27: # Tekan 'esc' untuk keluar
        break

cap.release()
cv2.destroyAllWindows()