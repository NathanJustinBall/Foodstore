import urllib
import json
import requests
import bs4
import io
from urllib.request import urlopen
import argparse

parser = argparse.ArgumentParser()
parser.add_argument('--barcode', type=str, required=True)
args = parser.parse_args()

class Drain:
    def __init__(self):
        self.predict_url = "https://groceries.asda.com/cmscontent/v2/items/autoSuggest?requestorigin=gi&searchTerm=ITEM&cacheable=true&storeId=4152&shipOnDate=2022-08-17&viewPort=xl"
        self.product_url = "https://groceries.asda.com/product/"
        self.current_itme = 0
        self.current_product_id = 0
        self.picture_class = "https://ui.assets-asda.com/dm/asdagroceries/"  # ammend item code here 27244920

    def build_predict_url(self, itemno):
        self.current_itme = self.predict_url.replace("ITEM", str(itemno))

    def get_product_page(self,):
        header = {"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36","X-Requested-With": "XMLHttpRequest"}
        r = requests.get(self.product_url+str(self.current_product_id), headers = header)
        # print(r.content)
        #if self.picture_class in r.text:
            #print("Pass")

    def get_image(self):
        image_str = urlopen(self.picture_class+str(self.current_product_id)).read()
        # create a file object (stream)
        image_file = io.BytesIO(image_str)

    def build_json_return(self, data):
        product = {}
        product["id"] = data["skuId"]
        product["name"] = data["skuName"]
        product["price"] = data["price"].replace("£", "")
        product["weight"] = data["weight"].replace(" ", "")
        print(json.dumps(product))

    def get_page(self):
        header = {"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36","X-Requested-With": "XMLHttpRequest"}
        r = requests.get(self.current_itme, headers = header)

        payload = json.loads(r.text)
        # print(r.text)

        item = payload["payload"]["autoSuggestionItems"][0]
        self.current_product_id = item["skuId"]

        self.build_json_return(item)
        self.get_product_page()

if __name__ == "__main__":
    main = Drain()
    barcode = args.barcode
    if barcode.isnumeric:
        main.build_predict_url(barcode)  # item barcode 21156946 27244920
        # is a number
        main.get_page()
    else:
        print("Invalid")

    
