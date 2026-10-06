MAIN PROGRAM
BEGIN MAIN

DISPLAY "CBLU CONNECT"

REPEAT
    DISPLAY "1 - ADMIN"
    DISPLAY "2 - CLIENT"
    DISPLAY "3 - EXIT"
    INPUT UserChoice

    IF UserChoice = 1 THEN
        CALL AdminLogin()
    ELSE IF UserChoice = 2 THEN
        CALL ClientMenu()
    END IF
UNTIL UserChoice = 3

END MAIN



ADMIN LOGIN
PROCEDURE AdminLogin()

BEGIN
INPUT Username
INPUT Password

IF Username = AdminUsername AND Password = AdminPassword THEN
    CALL AdminMenu()
ELSE
    DISPLAY "INVALID USERNAME OR PASSWORD"
END IF

END PROCEDURE




ADMIN MENU
PROCEDURE AdminMenu()

BEGIN

REPEAT
    DISPLAY "1 - HOMEPAGE MANAGEMENT"
    DISPLAY "2 - CONTENT MANAGEMENT"
    DISPLAY "3 - MESSAGE MANAGEMENT"
    DISPLAY "4 - LOGOUT"

    INPUT AdminChoice

    IF AdminChoice = 1 THEN
        CALL HomepageManagement()
    ELSE IF AdminChoice = 2 THEN
        CALL ContentManagement()
    ELSE IF AdminChoice = 3 THEN
        CALL MessageManagement()
    END IF
UNTIL AdminChoice = 4

END PROCEDURE



HOMEPAGE MANAGEMENT
PROCEDURE HomepageManagement()

BEGIN

DISPLAY "1 - CREATE ANNOUNCEMENT"
DISPLAY "2 - EDIT ANNOUNCEMENT"
DISPLAY "3 - UPLOAD ACHIEVEMENT"
DISPLAY "4 - UPLOAD CERTIFICATION"

INPUT Option

IF Option = 1 THEN
    INPUT Announcement
    SAVE Announcement
ELSE IF Option = 2 THEN
    SELECT Announcement
    UPDATE Announcement
ELSE IF Option = 3 THEN
    SELECT AchievementImage
    UPLOAD AchievementImage
ELSE IF Option = 4 THEN
    SELECT CertificationImage
    UPLOAD CertificationImage
END IF

END PROCEDURE



CONTENT MANAGEMENT
PROCEDURE ContentManagement()

BEGIN

DISPLAY "1 - UPDATE VISION"
DISPLAY "2 - UPDATE MISSION"
DISPLAY "3 - UPDATE HISTORY"
DISPLAY "4 - UPDATE SERVICES"
DISPLAY "5 - UPDATE CONTACT INFORMATION"

INPUT Option

IF Option = 1 THEN
    INPUT Vision
    SAVE Vision
ELSE IF Option = 2 THEN
    INPUT Mission
    SAVE Mission
ELSE IF Option = 3 THEN
    INPUT History
    SAVE History
ELSE IF Option = 4 THEN
    INPUT Services
    SAVE Services
ELSE IF Option = 5 THEN
    INPUT ContactInformation
    SAVE ContactInformation
END IF

END PROCEDURE

MESSAGE MANAGEMENT
PROCEDURE MessageManagement()

BEGIN

LOAD Messages
DISPLAY Messages
SELECT Message
INPUT Reply
SAVE Reply
SEND Reply

END PROCEDURE




CLIENT MENU
PROCEDURE ClientMenu()

BEGIN

REPEAT
DISPLAY "1 - VIEW HOME"
DISPLAY "2 - VIEW ABOUT US"
DISPLAY "3 - VIEW SERVICES"
DISPLAY "4 - SEND MESSAGE"
DISPLAY "5 - EXIT"

INPUT ClientChoice

IF ClientChoice = 1 THEN
    DISPLAY HomePage
ELSE IF ClientChoice = 2 THEN
    DISPLAY AboutUs
ELSE IF ClientChoice = 3 THEN
    DISPLAY Services
ELSE IF ClientChoice = 4 THEN
    CALL SendMessage()
END IF

UNTIL ClientChoice = 5

END PROCEDURE
SEND MESSAGE
PROCEDURE SendMessage()

BEGIN

INPUT Name
INPUT Email
INPUT Subject
INPUT Message

DISPLAY "ATTACH FILE?"
INPUT Answer

IF Answer = "YES" THEN
    SELECT File
    UPLOAD File
END IF

SAVE Name
SAVE Email
SAVE Subject
SAVE Message
SAVE File

DISPLAY "MESSAGE SENT"

END PROCEDURE      
