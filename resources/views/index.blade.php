<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="max-w-2xl mx-auto p-16">
      <h1 class="text-2xl font-bold text-center">Insta<span class="text-pink-500">Copy </span>API</h1>
      <p class="text-base text-justify my-4">InstaCopy API is a robust and versatile application programming interface (API) designed to replicate the core functionalities of Instagram, a popular social media platform. This API emulates essential features such as posting, commenting, and managing user accounts. It enables users to interact with the system by creating, reading, updating, and deleting (CRUD) their posts and comments.</p>
      <p>You can see documentation from <a class="text-blue-500 hover:text-blue-700" href="https://documenter.getpostman.com/view/30361185/2s9YR86Dsx">POSTMAN Documenter</a></p>

      <div class="my-10">
        <h2 class="text-xl font-semibold">Auth & Account Endpoint</h2>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-yellow-500">POST </span>/api/login</h3>
          <p>Authenticate and log in to the system. A token is provided upon successful login for subsequent authenticated actions.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-green-500">GET </span>/api/logout</h3>
          <p>Log out of the system and invalidate the authentication token. Authentication is required for this action.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-yellow-500">POST </span> /api/register</h3>
          <p>Create a new user account. Users can sign up by providing necessary account information.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-green-500">GET </span>/api/profile</h3>
          <p>Retrieve the profile information of the logged-in user. Authentication is required for this action.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-purple-500">PATCH </span>/api/profile/{id}</h3>
          <p>Update user account details. Only the owner of the account can perform this action. Users can modify their profile information.</p>
          <hr>
        </div>

      <div class="my-10">
        <h2 class="text-xl font-semibold">Posts Endpoint</h2>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-green-500">GET </span>/api/posts</h3>
          <p>Retrieve a list of all posts stored in the database.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-green-500">GET </span>/api/posts/{id}</h3>
          <p>Get detailed information about a specific post based on its id.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-yellow-500">POST </span> /api/posts</h3>
          <p>Create a new post. Authentication is required for this action. Users can add text, images, or other content to their post.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-purple-500">PATCH </span> /api/posts/{id}</h3>
          <p>Update an existing post. Only the owner of the post can perform this action. Users can modify the content or details of their posts.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-red-500">DELETE </span> /api/posts/{id}</h3>
          <p>Delete a post. Only the owner of the post can delete it. This action removes the post from the platform.</p>
          <hr>
        </div>
      </div>


      <div class="my-10">
        <h2 class="text-xl font-semibold">Comment Endpoint</h2>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-yellow-500">POST </span>/api/comment</h3>
          <p>Add a comment to a post. Authentication is required for this action. Users can interact with posts by leaving comments.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-purple-500">PATCH </span>/api/comment/{id}</h3>
          <p>Update an existing comment. Only the owner of the comment can perform this action. Users can modify their comments.</p>
          <hr>
        </div>
        <div class="my-4">
          <h3 class="text-lg"><span class="font-bold text-red-500">DELETE </span>/api/comment/{id}</h3>
          <p>Delete a comment. Only the owner of the comment can delete it. This action removes the comment from the post.</p>
          <hr>
        </div>       
      </div>  
      
      <div class="my-8">
        <h3 class="text-lg font-bold">Note</h3>
        <p class="text-justify">In this API, actions such as creating and updating posts or comments require appropriate authentication, and only the owners of posts or comments are authorized to perform certain actions. Be sure to handle authentication and authorization properly in your implementation of this API.</p>
      </div>

    </div>

</body>
</html>