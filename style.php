<?php
header("Content-type: text/css");
?>

/* General Body Styling */
body {
    background-color: #2D2D2D  !important; /* Soft Dark Gray */
    color: #F2F2F2; /* Off-White Text */
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    line-height: 1.6;
    letter-spacing: 0.3px;
    font-weight: 400;
    margin: 0;
    padding: 0;
}
/* General Body Text Styling */
body, p, span, li, td, th {
    color: #F2F2F2; /* Off-White Text */
    font-family: 'Open Sans', sans-serif; /* Sans-serif for legibility */
    font-size: 16px; /* Widely used size for legibility */
    line-height: 1.6; /* Clean spacing between lines */
    font-weight: 400; /* Natural appearance for text */
    letter-spacing: 0.3px; /* Enhances clarity without being spaced out */
    margin-bottom: 10px; /* Adds spacing for readability */
}
.card {
    background-color: #3B3B3B; /* Dark Gray */
    border: none; /* Remove card border */
    color: #F2F2F2; /* Ensure text color is Off-White */
}

.card-body {
    background-color: #3B3B3B; /* Match card background */
    color: #F2F2F2; /* Ensure text color is Off-White */
}
/* Background for the movie cards section */
.movies-section {
    background-color: #2D2D2D; 
    padding: 20px; /* Add padding for spacing */
    border-radius: 8px; /* Rounded corners for a modern look */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}
.movies-section .row {
    margin: 0; /* Remove any row margins */
}
.container {
    background-color: #2D2D2D; /* Matches body background */
}
.row {
    background-color: #2D2D2D; /* Matches body background */
}
/* Individual movie card styling for consistency */
.movie-card {
    display: flex; /* Flex layout for card content */
    flex-direction: column; /* Stack content vertically */
    justify-content: space-between; /* Distribute content evenly */
    height: 100%; /* Full height for uniformity */
    background-color: #3B3B3B !important; /* Matches card background */
    border: 1px solid #dee2e6; /* Optional border */
    border-radius: 5px; /* Rounded corners */
    overflow: hidden; /* Prevent overflow */
}
.movie-card img {
    height: 300px; /* Set a consistent height */
    object-fit: cover; /* Maintain image proportions and fill the area */
    width: 100%; /* Full width */
    height: auto; /* Maintain aspect ratio */
}
.movie-image {
    width: 100%;          /* Stretches to full width */
    height: 300px;        /* Enforces a consistent height */
    object-fit: cover;    /* Ensures the image fills the box without distortion */
    border-radius: 5px;   /* Optional: Slight rounding for a polished look */
    background-color: #ccc; /* Fallback background in case the image doesn't load */
}
.movie-card {
    width: 100%;            /* Ensure the card takes full width */
    max-width: 250px;       /* Limit the width for consistency */
    margin: 0 auto;         /* Center the card */
}

.card img {
    width: 100%;            /* Ensure the image takes up 100% of the container's width */
    height: 300px;          /* Set a consistent height */
    object-fit: cover;      /* Ensures the image fills the container without distortion */
    border-radius: 5px;     /* Optional: Slight rounding for a polished look */
    background-color: #ccc; /* Fallback background */
}


.card-footer {
    margin-top: auto; /* Push footer to the bottom */
    background-color: #3B3B3B; /* Matches card background */
    padding: 10px 0; /* Adjust padding */
    text-align: center; /* Center-align the button */
    border-top: 1px solid #dee2e6; /* Optional border for separation */
}
/* Ensure card-footer aligns properly */
.movie-card .card-footer {
    background-color: #3B3B3B; /* Match card background */
    border-top: 1px solid #dee2e6; /* Border to separate footer */
}

.movie-card:hover {
    transform: scale(1.05); /* Slight zoom on hover */
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15); /* Emphasized shadow on hover */
}
/* Additional rule for other normal text elements */
div, article, section {
    color: #F2F2F2;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    line-height: 1.6;
    font-weight: 400;
    letter-spacing: 0.3px;
}

/* Headers and Titles */
h1, h2, h3, h4, h5, h6 {
    color: #FFD700; /* Warm Yellow-Gold */
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    font-weight: 600;
    letter-spacing: 0.3px;
    margin-bottom: 10px; /* Prevent crowding */
}

/* Call-to-Action Text */
.cta-text {
    color: #B22222; /* Cinematic Deep Red */
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 18px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    background-color: #2D2D2D; /* Matches background for seamless integration */
    padding: 10px 15px;
    display: inline-block;
    border: none;
    cursor: pointer;
}

.cinematic-button {
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 18px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    color: #FFFFFF;
    background-color: #B22222;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
}



/* Button Styling */
button.cta-text:hover {
    background-color: #B22222; /* Highlight the Call-to-Attention Red */
    color: #F2F2F2; /* Text remains legible */
}
/* Book Now Button */
.btn-secondary {
    background-color: #B22222; /* Cinematic Deep Red */
    color: #FFFFFF; /* White text */
    font-family: 'Roboto Condensed', sans-serif; /* Call to Action font */
    font-size: 18px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}
/* Style for the 'Book Now' button */
.btn-book-now {
    background-color: #B22222; /* Cinematic Deep Red */
    font-family: 'Roboto Condensed', sans-serif; /* Font */
    font-size: 18px; /* Font size */
    font-weight: 700; /* Bold weight */
    letter-spacing: 0.5px; /* Sharp letter spacing */
    text-transform: uppercase; /* Uppercase text */
    color: #FFFFFF; /* White text for contrast */
    border: none; /* Remove button border */
    border-radius: 4px; /* Optional: Rounded corners */
    padding: 10px 20px; /* Adjust padding for balance */
    text-align: center; /* Center the text */
    text-decoration: none; /* Remove underline */
    transition: all 0.3s ease; /* Smooth hover effect */
}
btn btn-secondary

/* Hover effect for the 'Book Now' button */
.btn-book-now:hover {
    background-color: #8B0000; /* Darker shade of red for hover */
    color: #FFFFFF; /* Ensure text remains white */
    transform: scale(1.05); /* Slight zoom effect */
}
/* Card Components */
.card {
    /*   background-color: #1C1C1C; Slightly darker for card separation */
    background-color: #3B3B3B; /* Dark Gray */
    border: none;
    color: #F2F2F2;
}

.card-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    font-weight: 600;
    color: #FFD700; /* Warm Yellow-Gold */
    margin-bottom: 10px;
}

/* Links */
a {
    color: #FFD700; /* Warm Yellow-Gold */
    text-decoration: none;
}

a:hover {
    color: #F2F2F2; /* Off-White Text */
    text-decoration: underline;
}

/* Forms */
input, textarea, select {
    background-color: #3D3D3D; /* Dark Gray for form elements */
    color: #F2F2F2; /* Off-White Text */
    border: 1px solid #FFD700; /* Warm Yellow-Gold */
    font-family: 'Open Sans', sans-serif;
    padding: 10px;
    margin-bottom: 15px;
    width: 100%;
}

input:focus, textarea:focus, select:focus {
    border-color: #B22222; /* Cinematic Deep Red for focus */
    outline: none;
}

/* Modal Styling */
.modal-content {
    background-color: #2D2D2D;
    color: #F2F2F2;
    border: none;
}

.modal-header {
    border-bottom: 1px solid #FFD700; /* Warm Yellow-Gold separator */
}

.modal-title {
    color: #FFD700;
    font-family: 'Montserrat', sans-serif;
}

.modal-footer button {
    background-color: #B22222;
    color: #F2F2F2;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 18px;
    font-weight: 700;
    text-transform: uppercase;
}

/* Footer */
footer {
    background-color: #1C1C1C;
    color: #F2F2F2;
    padding: 15px 0;
    text-align: center;
    font-family: 'Open Sans', sans-serif;
    font-size: 14px;
    letter-spacing: 0.3px;
}

footer a {
    color: #FFD700;
    text-decoration: none;
}

footer a:hover {
    color: #B22222;
}
.movie-card h6 {
    font-size: 1.2rem; /* Slightly larger font size */
    font-weight: bold;
    color: #FFD700; /* Gold text */
    background-color: #3B3B3B; /* Matches card background */
    margin: 0; /* Remove margins */
    padding: 10px; /* Add padding for spacing */
    text-align: center; /* Center the title */
    width: 100%; /* Ensure the title spans the full width */
}
.card-footer a {
    color: #FFFFFF;
    background-color: #B22222;
    font-size: 1rem;
    font-weight: bold;
    padding: 10px 20px;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
    display: inline-block;
    text-decoration: none;
}
.card-header {
    background-color: #3B3B3B !important; /* Dark background color */
    color: #FFD700; /* Gold text color */
    border-bottom: 1px solid #dee2e6; /* Optional border */
    padding: 10px; /* Adjust padding */
    text-align: center; /* Center-align the text */
}
.card-footer a:hover {
    background-color: #8B0000;
    color: #F2F2F2;
    transform: scale(1.05);
}
.nav-item {
    color:  #2D2D2D !important; /* Light gray (or any other color you prefer) */
}
.nav-item.active {
    color: white; /* Active page in white */
}
/* CSS specific to the cinema.png icon */
.cinema-logo {
    height: 60px;  /* Adjust this value to make the icon smaller */
    width: auto;   /* Maintain aspect ratio */
}
.list-group-item {
    background-color: #2D2D2D !important; /* Adjust the color as desired */
    border: 1px solid #dee2e6; /* Optional: match the Bootstrap border */
}
.alert-success {
    color: #2b2b2b; /* Dark gray for better contrast */
}

.alert-danger {
    color: #ffffff; /* White text for red background */
}

.alert-danger a {
    color: #ffcccb; /* Light link color for better contrast on danger alerts */
}
/* Define custom styles for success alerts */
.custom-alert-success {
    color: #2b2b2b; /* Dark gray for better readability */
    background-color: #d4edda; /* Light green for alert success background */
}

/* Additional styles to ensure better text contrast */
.custom-alert-success strong {
    color: #000000; /* Black for bold text */
}

.custom-alert-success span {
    color: #007bff; /* Blue for reference numbers and important details */
}

.custom-alert-success p {
    margin-bottom: 1rem; /* Consistent spacing for paragraphs */
}

/* Custom alert styles for booking history */
.alert.alert-info.mt-4 {
    background-color: #6c757d; /*  gray background */
    color: #212529; /* Dark text color for readability */
    border: 1px solid #ddd; /* Add a subtle border for clarity */
}

.alert.alert-info.mt-4 h4 {
    color: #000; /* Darker text for headings */
}

.alert.alert-info.mt-4 strong {
    color: #000; /* Ensure bold text is black */
}

/* Custom alert styles for booking history */
.alert.alert-info {
    background-color: #6c757d; /*  gray background */
}
