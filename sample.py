import facebook

graph = facebook.GraphAPI(access_token="EAAQIgVzxxvsBAEqWXSZBnljDtj541iEAqrKtWIWTzshMNFgj1bDABMou96aZCZCDr8ZBchZARHHwlZBEmmB93UI0rGGwsHHjVG0WiIQ8TL3J6BMEse5mVO7l4cfZBEZCKZBVkQqvvkPpmlTfYl3cn0FZCa4NutwEZBfEycLICTVBvs1RfoaTCAQovQoDQbaY37ilPcZD",version="3.0")
print(graph)

post = graph.get_object(id='427814738066052')
# print(post['message'])

curl -i -X GET \
 "https://graph.facebook.com/v3.3/me?fields=id%2Cname&access_token=EAAQIgVzxxvsBAKRwWExAvm8R1lSiDMt7A1xbb8HqgsFRLumMZBskm55yLUIsyYuNv5RJoDwQzf612kfZAM9KMuHs3ORpEnW5OkXcJQphfKWWyfqRE4r2zwHWok6loEukKAlpFzM5ZAJajETZB7CNd1luu3raK5v6i19ZC821Yq4lQUNg62IJkzzRihM5fF0KNJcY5xzIxigZDZD"curl -i -X GET \
 "https://graph.facebook.com/v3.3/me?fields=id%2Cname%2Cfriends&access_token=EAAQIgVzxxvsBAKRwWExAvm8R1lSiDMt7A1xbb8HqgsFRLumMZBskm55yLUIsyYuNv5RJoDwQzf612kfZAM9KMuHs3ORpEnW5OkXcJQphfKWWyfqRE4r2zwHWok6loEukKAlpFzM5ZAJajETZB7CNd1luu3raK5v6i19ZC821Yq4lQUNg62IJkzzRihM5fF0KNJcY5xzIxigZDZD"