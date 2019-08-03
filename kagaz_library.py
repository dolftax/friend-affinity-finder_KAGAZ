import requests
import json
from ibm_watson import PersonalityInsightsV3
import json

accToken = "EAAQIgVzxxvsBANfrCbayGw7WE8ULqdOFtwiR8aXqbKY6ZBe2jCuqG42hSQyIdRwkfyUVzIfZAkHv2Tqgt3FsVqdxUp9gjsKy7cpk0oIsYp1MvfWM3gLMlhy2OZAjjxYufyIHB7PrLvJRaG3UfSJt1kFeH7qvf3BmmQ5n5MGzkZCYGyWZCVcc5N3ATZC4rhGbQZD"
PIurl = 'https://gateway-lon.watsonplatform.net/personality-insights/api'
PIapiKey = "SnXXYpCYPjwRdKFB7vCEUTUPSlSUDJG_zYzGvd0qTs0n"
service = PersonalityInsightsV3(version = '2017-10-13',iam_apikey = PIapiKey,url = PIurl)

images = []
def textOf(node):
    """extracts and returns the text available in the passed object"""
    keys = ["message","description","name","about"]
    retText = []
    for key in keys:
        if key in node:
            retText.append(node[key])
    return retText
def picOf(node):
    """returns the picture associated with the node"""
    key = "full_picture"
    if key in node:
        return node[key]
    key1 = "picture"
    if key1 in node:
        return node[key1]
def dataOfPost():
    """collects texts from personal posts and records for watsonInput"""
    postUrl =  "https://graph.facebook.com/v3.3/me?fields=posts%7Bname%2Cdescription%2Cmessage%2Cfull_picture%7D&access_token="+accToken
    postResp = requests.get(postUrl)
    print(postResp)
    postDict = json.loads(postResp.text)
    postList = postDict["posts"]["data"]
        ##open watsonInput file
#     watsonInput = open(r"watsonInput","a+")
    for post in postList:
        with open(r"./analyse/watsonInput","w") as watsonInput:
            postText = textOf(post)
            for line in postText:
                watsonInput.write("%s\n"% line)
            images.append(picOf(post))

def dataOfLikes():
    """collects texts from liked posts"""
    likeUrl = "https://graph.facebook.com/v3.3/me?fields=likes%7Bname%2Cabout%2Cpicture%7D&access_token="+accToken
    likeResp = requests.get(likeUrl)
    print(likeResp)
    likeDict = json.loads(likeResp.text)
    likeList = likeDict["likes"]["data"]
    for like in likeList:
        with open(r"./analyse/watsonInput","a+") as watsonInput:
            likeText = textOf(like)
            for line in likeText:
                watsonInput.write("%s\n"%line)
            images.append(picOf(like))
            
def dataCollection():
    """collects data from variious means"""
    dataOfPost()
    dataOfLikes()
def generateAttributes():
    """passes the textual data and fetches personality profile from IBM Personality Insights"""    
    watsonInput = open("./analyse/watsonInput","r")
    text = watsonInput.read()
    profile = service.profile(text,"application/json",content_type="text/plain",consumption_preferences=True,raw_scores=True).get_result()
    insights = open("./analyse/insights.json",'w')
    insights.write(json.dumps(profile, indent = 2))
    print(json.dumps(profile, indent = 2))
