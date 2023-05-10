## API Endpoints

# Register
To register the user:  /api/resgiter <br>
Method: POST <br>
Parameter Required: name, email, password
<br>

# Login
To Login the user : /api/login <br>
Method: POST <br>
Parameters Required: email, password <br>
Token will be generated and need to be copied.

# All Users
To All Get the users : /api/get_all_profiles <br>
Method: GET <br>
Authorization Required : Bearer Token<br>
Pass the token to in headers<br>

# One User
To All Particular users : /api/get_profile/id <br>
Method: GET <br>
Authorization Required : Bearer Token<br>
Pass the token to in headers<br>

# Logout
To Logout the user: /api/logout<br>
Authorization Required : Bearer Token<br>
Pass the token to in headers<br>
