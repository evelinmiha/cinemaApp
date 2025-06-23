<?php
// Include the navigation bar
include('navSimple.php');
?>
<h1>Contact Form</h1>
<form id="contact_form" name="contact_form" method="post">
    <!-- Name Fields (First Name and Last Name) -->
    <div class="mb-5 row">
        <div class="col">
            <label for="first_name">First Name</label>
            <input type="text" required maxlength="50" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="col">
            <label for="last_name">Last Name</label>
            <input type="text" required maxlength="50" class="form-control" id="last_name" name="last_name">
        </div>
    </div>

    <!-- Email and Phone Fields -->
    <div class="mb-5 row">
        <div class="col">
            <label for="email_addr">Email address</label>
            <input type="email" required maxlength="50" class="form-control" id="email_addr" name="email"
                placeholder="name@example.com">
        </div>
        <div class="col">
            <label for="phone_input">Phone</label>
            <input type="tel" required maxlength="50" class="form-control" id="phone_input" name="phone"
                placeholder="Phone">
        </div>
    </div>

    <!-- Address Field -->
    <div class="mb-5">
        <label for="address">Address</label>
        <input type="text" required maxlength="100" class="form-control" id="address" name="address" placeholder="Your Address">
    </div>

    <!-- Message Field -->
    <div class="mb-5">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary px-4 btn-lg">Submit</button>
</form>