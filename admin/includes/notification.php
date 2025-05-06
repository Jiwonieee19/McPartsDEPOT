<?php
            if (isset($_SESSION['notification'])) {
                // Get the notification type and message
                $notification = $_SESSION['notification'];
                $type = $notification['type']; // 'success' or 'danger'
                $message = $notification['message'];

                // Display the notification
                echo "<div class='alert alert-$type alert-dismissible fade show' role='alert' id='notification-alert'>
                        $message
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";

                // Clear the notification from the session after it's displayed
                unset($_SESSION['notification']);
            }
            ?>