import cv2
import matplotlib.pyplot as plt

img = cv2.imread('sourov.jpeg')

rgbimg = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
print(rgbimg)
plt.imshow(rgbimg)

plt.waitforbuttonpress()
plt.close('all')