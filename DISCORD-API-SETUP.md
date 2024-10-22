xUCP Free V5 Readme
(C) 2024 DerStr1k3r.com
https://derstr1k3r.com
https://discord.gg/xg5mnYUWch

1. Create a Discord application
Visit Discord Developer Portal: https://discord.com/developers/applications
Go to the Discord Developer Portal.

Create a new application:
Click "New Application" and give your application a name.

Configure OAuth2 settings:

Go to "OAuth2" in the menu on the left.
Under "Redirects" add the URL you want Discord to redirect to after successful authentication. This URL must match your actual callback 
URL, e.g. https://your-website.com/app/features/user/xucp_signin_callback.
Copy Client ID and Client Secret:

Go to "General Information" and copy the "Client ID".
Go to "OAuth2" and copy the "Client Secret". You will need these two values ​​later in your code.
2. Configure your server
Make sure your server is able to use HTTPS, as Discord authentication only works over secure connections.

3. Configure your xUCP Free V5
Open the .env file and configure your discord Settings.
