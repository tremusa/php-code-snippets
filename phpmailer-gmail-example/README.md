# Send Mail Using Gmail SMTP Function
## Created using PHPMailer function

### How to use :

- **Step 1:** Import the sendMail.php in your source code as `require_once('sendMail.php');`

- **Step 2:** Call sendMail() function with following arguments.

  - `sendMail($recepientsEmail, $subjectOfMail, $messageContent)`;
  - `$recepientsEmail` - Recievers email address.
  - `$subjectOfMail`   - Subject for email.
  - `$messageContent`  - Body of mail. Either text or html.
  - The function will return an status variable whose value will be
	`Sent` if mail was succesful, otherwise it will contain the error message.

```
Note:	You need to configure the sendMail.php file according to your details.
	Details such as username, password, sender, replyto needs to be configured
	with your own account details. If you're using Gmail for testing, visit
	https://myaccount.google.com/security and set **Allow less secure apps** to On.
```

