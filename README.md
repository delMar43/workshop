# workshop

This holds the PHP-based web UI for http://workshop.solsector.net and the routines required to export all the available campaign data as XML.
Of course, this also holds the code to persist data. I haven't decided yet, whether this will be done by using MySQL, plain-text or whatever.

The XML files can then be used with UnnamedCharacter's WC1 library to encode them into binary data files that can be used with the original game engine.

## More information
Visit http://www.wcnews.com/chatzone/threads/wc-workshop-online.27177/ for discussing this project in particular. For general information about Wing Commander, visit www.wcnews.com.

## Architecture
The workshop consists of a UI and an XML component. The changes that are made by users on the UI are persisted and can be "exported" to XML files. Those XML files are intended to be the input for XML<->Binary converters (eg UnnamedCharacter's WingCommander Games Library), which can generate ready-to-use gamefiles.

UI and XML will be hosted on workshop.solsector.net, which is why it is implemented in as-plain-as-possible PHP. Besides that, the workshop can directly interact with converters, provided they are available elsewhere (solsector can not host them). That means that via the workshop UI, users will be able to directly download binary data files.

I will try to make the WC games library available as a web service, which receives an XML file as POST parameter and returns the binary file as a response.
