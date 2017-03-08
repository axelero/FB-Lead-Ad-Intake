# Facebook Lead Ad Intake Service
Intake Service for capturing leads from Facebook Lead Ads

##Get Permanent Page Access Token
*Adapted from Facebook for Developers [Access and Authentication](https://developers.facebook.com/docs/marketing-api/access)*

1. First you need to obtain a **Short-Lived User Access Token**
  1. Go to [Graph API Explorer](https://developers.facebook.com/tools/explorer/)
  1. In **Application**, select an app used to obtain the access token
  1. Click **Get Token** → **Get User Token**
  1. Under **Events, Groups &amp; Pages**, Check **manage_pages**
  1. Click **Get Access Token**
  1. Click **i** in the access token field
  1. Click **Open in Access Token Tool** to see the token in **Access Token Debugger**
  1. Check the properties in **Access Token Debugger**
  1. Paste the access token copied in the last step above to the text field and click “Debug” button. Please check the followings:
    - **App ID**: the app id mentioned in the prerequisite section
    - **User ID**: you, a person who has admin right to the Facebook Page mentioned in the prerequisite section
    - **Expires**: a time stamp that would probably expires in *an hour or two*
    - **Scope**: should contain the “manage_page” permission
1. Exchange the Short-Lived User Access Token for a Long-Lived Access Token
  1. Click **Extend Access Token** to get a long-lived token
  1. Copy the long-lived token
  1. Check the properties of this access token in **Access Token Debugger**. It should have a longer time such as *60 days*, or *Never* next to **Expires**. 
1. Get Permanent Page Access Token
  1. Go to [Graph API Explorer](https://developers.facebook.com/tools/explorer/)
  1. Select your **app** in **Application**
  1. Paste the long-lived access token you obtained in Step 2 into **Access Token**
  1. Next to **Access Token**, choose the page you want an access token for. The access token appears as a new string.
  1. Click **i** to see the properties of this access token
  1. Click **“Open in Access Token Tool”** button again to open the **“Access Token Debugger”** tool to check the properties
  1. Check the properties of this page access token in **Access Token Debugger**:
    - **App ID**: the app id mentioned in the prerequisite section
    - **Profile ID**: the page id mentioned in the prerequisite section
    - **User ID**: you, a person who has admin right to the Facebook Page mentioned in the prerequisite section
    - **Expires**: ***Never***
    
 **Use this *Permanent Page Access Token* in the code where is says `FACEBOOK_TOKEN_GOES_HERE`**
