<!-- resources/views/emails/contactus.blade.php -->

<h1>Contact Us Form Submission</h1>

<p>User Name: {{ $data['userName'] }}</p>
<p>User Email: {{ $data['userEmail'] }}</p>
<p>User Subject: {{ $data['userSubject'] }}</p>
<p>User Message: {{ $data['userMessage'] }}</p>