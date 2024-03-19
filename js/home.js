// Select all like buttons
const likeButtons = document.querySelectorAll('.interaction-button .uil-heart');

// Loop through each like button and add an event listener
likeButtons.forEach(likeButton => {
    likeButton.addEventListener('click', () => {
        // Toggle the class to change the color
        likeButton.classList.toggle('liked');

        // Update the like count
        const likeCountElement = likeButton.parentNode.querySelector('.like-count');
        if (likeButton.classList.contains('liked')) {
            // Increment like count
            likeCountElement.textContent = parseInt(likeCountElement.textContent) + 1;
        } else {
            // Decrement like count if unliked
            likeCountElement.textContent = parseInt(likeCountElement.textContent) - 1;
        }
    });
});








//==================== for add feed =============

// Function to show the create post modal
function showCreatePostModal() {
    document.getElementById('createPostModal').style.display = 'block';
}

// Function to close the create post modal
function closeCreatePostModal() {
    document.getElementById('createPostModal').style.display = 'none';
}

// Event listener for clicking on the create post button
document.getElementById('create-post').addEventListener('click', function() {
    showCreatePostModal();
});

// Event listener for closing the create post modal
document.querySelector('.modal-content .close').addEventListener('click', function() {
    closeCreatePostModal();
});

// Event listener for submitting the post form
document.getElementById('postForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission behavior

    // Get post content and image data
    const postContent = document.getElementById('postContent').value;
    const postImage = document.getElementById('postImage').files[0]; // Assuming only one image is selected

    // Perform AJAX request to send post data to backend
    const formData = new FormData();
    formData.append('content', postContent);
    formData.append('image', postImage);

    // Here you should send the form data to your backend API endpoint to create a new post
    // Example:
    
    fetch('/api/create-post', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Post created successfully:', data);
        // Close the modal after successful post creation
        closeCreatePostModal();
        // Refresh the feed to display the new post
        fetchPosts(); // You need to implement this function to fetch posts
    })
    .catch(error => {
        console.error('Error creating post:', error);
    });
    

    // For demonstration purposes, let's simulate adding the new post to the feed immediately
    const newPost = createPostElement(postContent, postImage); // Create HTML element for the new post
    const feedElement = document.querySelector('.feeds');
    feedElement.insertBefore(newPost, feedElement.firstChild); // Insert the new post at the beginning of the feed

    // Close the modal after adding the new post
    closeCreatePostModal();
});

// Function to create HTML element for a new post
function createPostElement(content, image) {
    const postElement = document.createElement('div');
    postElement.classList.add('feed');

    // Create HTML elements for the new post (including content, image, etc.)
    // Example:
    
    postElement.innerHTML = `
        <div class="head">
            <!-- Add user profile picture and information -->
        </div>
        <div class="photo">
            <!-- Add post image -->
        </div>
        <!-- Add post action buttons, liked by section, caption, comments, etc. -->
    `;
    

    return postElement;
}

// ======================================================================================================







  





