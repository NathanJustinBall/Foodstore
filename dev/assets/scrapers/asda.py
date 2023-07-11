import urllib
import json
import requests
import bs4
import io
from urllib.request import urlopen
import argparse

parser = argparse.ArgumentParser()
parser.add_argument('--barcode', type=str, required=True)
parser.add_argument('--show', type=bool, required=False)
args = parser.parse_args()

class Drain:
    def __init__(self):
        self.predict_url = "https://groceries.asda.com/cmscontent/v2/items/autoSuggest?searchTerm=ITEM"
        self.product_url = "https://groceries.asda.com/product/"
        self.current_itme = 0
        self.current_product_id = 0
        self.picture_class = "https://ui.assets-asda.com/dm/asdagroceries/"  # ammend item code here 27244920

    def build_predict_url(self, itemno):
        self.current_itme = self.predict_url.replace("ITEM", str(itemno))

    def get_product_page(self,):
        header = {"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36","X-Requested-With": "XMLHttpRequest"}
        r = requests.get(self.product_url+str(self.current_product_id), headers = header)


    def get_image(self):
        return urlopen(self.picture_class+str(self.current_product_id))

    def build_json_return(self, data, img):
        product = {}
        product["item_skuid"] = data["skuId"]
        product["image_adr"] = img
        product["item_name"] = data["skuName"]
        product["item_price"] = data["price"].replace("£", "")
        product["item_weight"] = data["weight"].replace(" ", "").strip("G")
        product["item_url"] = self.current_itme
        product["item_vendor"] = "asda"
        print(json.dumps(product))  # final call

    def get_page(self):
        header = {"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.75 Safari/537.36","X-Requested-With": "XMLHttpRequest"}
        r = requests.get(self.current_itme, headers = header)

        payload = json.loads(r.text)

        try:
            item = payload["payload"]["autoSuggestionItems"][0]  # possbily offer all?
        except IndexError:
            print("invalid")
            return 0
        if sp:
            print(self.current_itme)
            print(item)
        self.current_product_id = item["skuId"]
        img_url = self.picture_class+str(item["scene7AssetId"])  #scene7AssetId is the serach response image
        self.build_json_return(item, img_url)
        self.get_product_page()

if __name__ == "__main__":
    main = Drain()
    barcode = args.barcode
    sp = args.show
   
    main.build_predict_url(barcode) 
    main.get_page()
 
    
