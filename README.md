[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Pastebin/functions?utm_source=RapidAPIGitHub_PastebinFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Pastebin Package

* Domain: [Pastebin](http://pastebin.com)
* Credentials: apiDevKey

## How to get credentials: 
1. Sing up and go [API page](https://pastebin.com/api). There will be Your Unique Developer API Key



## Custom datatypes: 
| Datatype  |Description|Example
|------------|-----------|----------
| Datepicker |String which includes date and time|```2016-05-28 00:00:00```
| Map        |String which includes latitude and longitude coma separated|```50.37, 26.56```
| List       |Simple array|```["123", "sample"]``` 
| Select     |String with predefined values|```sample```
| Array      |Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## Pastebin.createApiUserKey
Creating An apiUserKey

| Field    | Type       | Description
|----------|------------|----------
| apiDevKey| credentials| This is your API Developer Key
| userName | String     | This is the username of the user you want to login
| userPass | String     | This is the password of the user you want to login

## Pastebin.createPaste
Creating A New Paste

| Field     | Type       | Description
|-----------|------------|----------
| apiDevKey | credentials| This is your API Developer Key
| code      | String     | This is the text that will be written inside your paste
| apiUserKey| String     | Use apiUserKey from createApiUserKey endpoint to own this paste. If not set, paste will be own by Guest
| name      | String     | This will be the name / title of your paste
| format    | String     | This will be the syntax highlighting value
| private   | Select     | This makes a paste public or private, public = 0, unlisted = 1, private = 2
| expireDate| Select     | This sets the expiration date of your paste. There are 7 valid values available which you can use: N = Never, 10M = 10 Minutes, 1H = 1 Hour, 1D = 1 Day, 1W = 1 Week, 2W = 2 Weeks, 1M = 1 Month

## Pastebin.getUserPastes
Listing Pastes Created By A User

| Field     | Type       | Description
|-----------|------------|----------
| apiDevKey | credentials| This is your API Developer Key
| apiUserKey| String     | To get apiUserKey use createApiUserKey endpoint
| limit     | Number     | By default its set to 50, min value is 1, max value is 1000

## Pastebin.getTrendingPastes
Listing Trending Pastes

| Field    | Type       | Description
|----------|------------|----------
| apiDevKey| credentials| This is your API Developer Key

## Pastebin.deleteUserPaste
Deleting A Paste Created By A User

| Field    | Type       | Description
|----------|------------|----------
| apiDevKey| credentials| This is your API Developer Key

## Pastebin.getUser
Getting A Users Information And Settings

| Field     | Type       | Description
|-----------|------------|----------
| apiDevKey | credentials| This is your API Developer Key
| apiUserKey| String     | To get apiUserKey use createApiUserKey endpoint

## Pastebin.getUserPastesRaw
Getting raw paste output of users pastes including 'private' pastes

| Field     | Type       | Description
|-----------|------------|----------
| apiDevKey | credentials| This is your API Developer Key
| apiUserKey| String     | To get apiUserKey use createApiUserKey endpoint
| pasteKey  | String     | Paste key

## Pastebin.getSinglePasteRaw
Getting raw paste output of any 'public' & 'unlisted' pastes

| Field   | Type  | Description
|---------|-------|----------
| pasteKey| String| Paste key

