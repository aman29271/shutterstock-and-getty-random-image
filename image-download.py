import requests
import wget
import json
from tqdm import tqdm


shutterstock = "http://tab.shutterstock.com/photos"
gettyimages = "https://6v0luvcal3.execute-api.us-west-2.amazonaws.com/prod/backgroundimagecached"

def g(count):
    # print(count)
    for i in tqdm(range(count)):
        response = requests.get(gettyimages)
        responseData = response.json()
        image_link = responseData['high_res_comp']
        wget.download(image_link)

def bar_custom(current, total, width=80):
    print("Downloading: %d%% [%d / %d] bytes" % (current / total * 100, current, total))

def s(count):
    # print(count)
    for i in tqdm(range(count)):
        response = requests.get(shutterstock)
        responseData = response.json()
        image_link = responseData['image_url']
        wget.download(image_link)

while True:
    while True:
        print("From where you want to download image.")
        print("1. shutterstock    2. Gettyimages")
        inputResponse = input("Your choice : (1/2) ")
        if inputResponse == 1 :
            imagesCount = input("How many images you want to download : ")
            if imagesCount < 1 :
                print("You must enter a number.")
            else:
                s(imagesCount)
        elif inputResponse == 2 :
            imagesCount = input("How many images you want to download : ")
            if imagesCount < 1 :
                print("You must enter a number.")
            else:
                g(imagesCount)
        else:
            print("You have entered an invalid response.")
        break
    print("Thanks for using.")
    break
