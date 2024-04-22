// resources/js/notifications.js
$(document).ready(function() {
    // Function to create a new notification
    function createNotification(userId, message) {
        $.post('/notifications/create', { userId, message }, function(response) {
            // Handle the response if needed
        });
    }

    // Function to get and display notifications
    function getNotifications(userId) {
        $.get('/notifications/' + userId, function(notifications) {
            // Display the notifications to the user, e.g., in a dropdown or notification panel
            notifications.forEach(function(notification) {
                // Add notification to the user interface
            });
        });
    }

    // Example: Create a birthday notification
    createNotification(userId, 'Happy Birthday! 🎉');

    // Example: Retrieve and display notifications
    getNotifications(userId);
});
