# Online Notepad

This project is a simple online notepad application built with PHP and MySQL. It allows users to create, read, update, and delete notes. The application also includes user authentication functionality.

## Project Structure

The project is structured as follows:

```
.
├── .DS_Store
├── .vscode/
│   └── settings.json
├── css/
│   └── styles.css
├── images/
├── includes/
│   ├── db.php
│   └── functions.php
├── index.php
└── pages/
    ├── create_note.php
    ├── dashboard.php
    ├── delete_note.php
    ├── login.php
    ├── logout.php
    ├── read_note.php
    ├── register.php
    └── update_note.php
```

## Key Files

- [`includes/db.php`](command:_github.copilot.openSymbolInFile?%5B%22includes%2Fdb.php%22%2C%22includes%2Fdb.php%22%5D "includes/db.php"): This file sets up the connection to the MySQL database.
- [`includes/functions.php`](command:_github.copilot.openSymbolInFile?%5B%22includes%2Ffunctions.php%22%2C%22includes%2Ffunctions.php%22%5D "includes/functions.php"): This file contains various utility functions used throughout the application.
- [`pages/create_note.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Fcreate_note.php%22%2C%22pages%2Fcreate_note.php%22%5D "pages/create_note.php"): This page allows users to create a new note.
- [`pages/dashboard.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Fdashboard.php%22%2C%22pages%2Fdashboard.php%22%5D "pages/dashboard.php"): This is the main page where users can view all their notes.
- [`pages/delete_note.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Fdelete_note.php%22%2C%22pages%2Fdelete_note.php%22%5D "pages/delete_note.php"): This page handles the deletion of notes.
- [`pages/login.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Flogin.php%22%2C%22pages%2Flogin.php%22%5D "pages/login.php"): This page handles user login.
- [`pages/logout.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Flogout.php%22%2C%22pages%2Flogout.php%22%5D "pages/logout.php"): This page handles user logout.
- [`pages/read_note.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Fread_note.php%22%2C%22pages%2Fread_note.php%22%5D "pages/read_note.php"): This page displays the content of a single note.
- [`pages/register.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Fregister.php%22%2C%22pages%2Fregister.php%22%5D "pages/register.php"): This page handles user registration.
- [`pages/update_note.php`](command:_github.copilot.openSymbolInFile?%5B%22pages%2Fupdate_note.php%22%2C%22pages%2Fupdate_note.php%22%5D "pages/update_note.php"): This page allows users to update an existing note.
- [`css/styles.css`](command:_github.copilot.openSymbolInFile?%5B%22css%2Fstyles.css%22%2C%22css%2Fstyles.css%22%5D "css/styles.css"): This file contains all the CSS styles used in the application.


## Usage

1. Register a new user account on the registration page.
2. Log in with your user credentials.
3. On the dashboard, you can create a new note, view all your notes, and log out.
4. Click on a note to view its content.
5. On the note page, you can update or delete the note.

## Styling

The application uses a simple monospace font and a light color scheme. The CSS styles can be found in [`css/styles.css`](command:_github.copilot.openSymbolInFile?%5B%22css%2Fstyles.css%22%2C%22css%2Fstyles.css%22%5D "css/styles.css"). The layout is responsive and works well on both desktop and mobile devices.
