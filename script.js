const video = document.getElementById('camera');

navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' } })
    .then(function (stream) {
        video.srcObject = stream;
    })
    .catch(function (error) {
        console.error('Error accessing the camera: ', error);
    });

function captureAndSaveImage() {
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert the canvas image to Blob
    canvas.toBlob(function (blob) {
        // Create a FormData object to send the Blob
        const formData = new FormData();
        formData.append('image', blob, 'image.png');

        // Send the image to the server using a POST request
        sendImageToServer(formData);
    }, 'image/png');
}

// Capture and save an image every 5 seconds (adjust the interval as needed)
setInterval(captureAndSaveImage, 5000);

function sendImageToServer(formData) {
    fetch('saveImage.php', {
        method: 'POST',
        body: formData,
    })
        .then(function (response) {
            if (response.ok) {
                console.log('Image saved successfully');
            } else {
                console.error('Error saving image');
            }
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
}
