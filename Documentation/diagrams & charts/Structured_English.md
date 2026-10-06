STRUCTURED ENGLISH OF CBLU CONNECT

1. User Registration and Login

BEGIN
IF the user is not registered
  DISPLAY the registration form
  ACCEPT the required user information
  VALIDATE the entered information
  IF the information is valid
    CREATE the user account
    DISPLAY registration success message
  ELSE
    DISPLAY an error message
  ENDIF
ENDIF

ACCEPT the user's login credentials
VALIDATE the credentials
IF the credentials are correct
  GRANT access to the appropriate dashboard
ELSE
  DISPLAY an invalid credentials message
ENDIF
END

2. Client Dashboard

BEGIN
AFTER successful login
  DISPLAY the client dashboard
  DISPLAY available announcements
  DISPLAY bank services
  DISPLAY events and activities
  DISPLAY frequently asked questions
  DISPLAY online inquiry options
  DISPLAY assisted checklist
ALLOW the client to select a desired function
END

3. Announcements and Information

BEGIN
RETRIEVE published announcements from the database
DISPLAY the announcements to the client
IF the client selects an announcement
  DISPLAY the complete announcement details
ENDIF
END

4. Bank Services Information

BEGIN
RETRIEVE available bank services from the database
DISPLAY the list of services
IF the client selects a service
  DISPLAY the service description and requirements
ENDIF
END

5. Online Inquiry and Feedback

BEGIN
ACCEPT the client's inquiry or feedback
VALIDATE the submitted information
IF the information is complete
  SAVE the inquiry or feedback to the database
  NOTIFY the administrator
  DISPLAY submission confirmation
ELSE
  DISPLAY an error message
ENDIF
END

6. Assisted Checklist with OCR and Validation

BEGIN
DISPLAY the requirements checklist for the selected service
ALLOW the client to upload a required document
RECEIVE the uploaded document
PERFORM Optical Character Recognition (OCR)
EXTRACT relevant text and information from the document
COMPARE the extracted information with the required criteria

IF the required information is present and valid
  MARK the requirement as VERIFIED
  DISPLAY a validation success message
ELSE
  MARK the requirement as NOT VERIFIED
  DISPLAY the missing or invalid requirement
ENDIF

UPDATE the checklist status
DISPLAY the validation results to the client
END

7. Administrator Dashboard

BEGIN
AFTER successful administrator login
  DISPLAY the administrator dashboard
  DISPLAY system management options
ALLOW the administrator to manage users
ALLOW the administrator to manage announcements
ALLOW the administrator to manage services
ALLOW the administrator to manage events
ALLOW the administrator to manage FAQs
ALLOW the administrator to view inquiries and feedback
ALLOW the administrator to manage checklist requirements
ALLOW the administrator to review OCR and validation results
END

8. Data Management

BEGIN
RECEIVE data from users or administrators
VALIDATE the received data
IF the data is valid
  STORE the data in the database
  UPDATE the corresponding system record
ELSE
  REJECT the data
  DISPLAY an error message
ENDIF
END

9. Logout

BEGIN
WHEN the user selects LOGOUT
  TERMINATE the current session
  CLEAR the active session data
  REDIRECT the user to the login page
END
