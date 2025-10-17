<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Tara API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8080";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.3.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.3.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-tara-api-documentation" class="tocify-header">
                <li class="tocify-item level-1" data-unique="tara-api-documentation">
                    <a href="#tara-api-documentation">Tara API Documentation</a>
                </li>
                                    <ul id="tocify-subheader-tara-api-documentation" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="what-is-tara">
                                <a href="#what-is-tara">🎯 What is Tara?</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="key-features">
                                <a href="#key-features">🚀 Key Features</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="api-overview">
                                <a href="#api-overview">📋 API Overview</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication">
                                <a href="#authentication">🔐 Authentication</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="getting-started">
                                <a href="#getting-started">📚 Getting Started</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="example-workflow">
                                <a href="#example-workflow">🌟 Example Workflow</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="how-to-authenticate">
                                <a href="#how-to-authenticate">How to Authenticate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="protected-endpoints">
                                <a href="#protected-endpoints">Protected Endpoints</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="public-endpoints">
                                <a href="#public-endpoints">Public Endpoints</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="token-expiration">
                                <a href="#token-expiration">Token Expiration</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-register">
                                <a href="#authentication-POSTapi-auth-register">Register a new user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-login">
                                <a href="#authentication-POSTapi-auth-login">Login user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-logout">
                                <a href="#authentication-POSTapi-auth-logout">Logout user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-GETapi-auth-user">
                                <a href="#authentication-GETapi-auth-user">Get authenticated user</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-health">
                                <a href="#endpoints-GETapi-health">GET api/health</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-events">
                                <a href="#endpoints-GETapi-events">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-events--id-">
                                <a href="#endpoints-GETapi-events--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-events">
                                <a href="#endpoints-POSTapi-events">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-events--id-">
                                <a href="#endpoints-PUTapi-events--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-events--id-">
                                <a href="#endpoints-DELETEapi-events--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-events-my-events">
                                <a href="#endpoints-GETapi-events-my-events">Get user's events</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-posts">
                                <a href="#endpoints-GETapi-posts">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-posts">
                                <a href="#endpoints-POSTapi-posts">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-posts--id-">
                                <a href="#endpoints-GETapi-posts--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-posts--id-">
                                <a href="#endpoints-PUTapi-posts--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-posts--id-">
                                <a href="#endpoints-DELETEapi-posts--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-bookings">
                                <a href="#endpoints-GETapi-bookings">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-bookings">
                                <a href="#endpoints-POSTapi-bookings">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-bookings--id-">
                                <a href="#endpoints-GETapi-bookings--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-bookings--id-">
                                <a href="#endpoints-PUTapi-bookings--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-bookings--id-">
                                <a href="#endpoints-DELETEapi-bookings--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-protected">
                                <a href="#endpoints-GETapi-protected">GET api/protected</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-feed" class="tocify-header">
                <li class="tocify-item level-1" data-unique="feed">
                    <a href="#feed">Feed</a>
                </li>
                                    <ul id="tocify-subheader-feed" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="feed-GETapi-feed">
                                <a href="#feed-GETapi-feed">Get personalized feed for the authenticated user</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-feed-discovery" class="tocify-header">
                <li class="tocify-item level-1" data-unique="feed-discovery">
                    <a href="#feed-discovery">Feed Discovery</a>
                </li>
                                    <ul id="tocify-subheader-feed-discovery" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="feed-discovery-GETapi-feed-discover">
                                <a href="#feed-discovery-GETapi-feed-discover">Discover new events and content</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-follow" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follow">
                    <a href="#follow">Follow</a>
                </li>
                                    <ul id="tocify-subheader-follow" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follow-GETapi-follow">
                                <a href="#follow-GETapi-follow">Get follow relationships overview</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-follow-actions" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follow-actions">
                    <a href="#follow-actions">Follow Actions</a>
                </li>
                                    <ul id="tocify-subheader-follow-actions" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follow-actions-POSTapi-follow">
                                <a href="#follow-actions-POSTapi-follow">Follow a user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="follow-actions-DELETEapi-follow">
                                <a href="#follow-actions-DELETEapi-follow">Unfollow a user</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-follow-lists" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follow-lists">
                    <a href="#follow-lists">Follow Lists</a>
                </li>
                                    <ul id="tocify-subheader-follow-lists" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follow-lists-GETapi-follow-followers">
                                <a href="#follow-lists-GETapi-follow-followers">Get followers list</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="follow-lists-GETapi-follow-following">
                                <a href="#follow-lists-GETapi-follow-following">Get following list</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-follow-status" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follow-status">
                    <a href="#follow-status">Follow Status</a>
                </li>
                                    <ul id="tocify-subheader-follow-status" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follow-status-GETapi-follow-status">
                                <a href="#follow-status-GETapi-follow-status">Check follow status</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: October 17, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="tara-api-documentation">Tara API Documentation</h1>
<p>Welcome to the <strong>Tara API</strong> - a comprehensive social media platform for travel and adventure experiences in the Philippines.</p>
<h2 id="what-is-tara">🎯 What is Tara?</h2>
<p>Tara is a social media platform focused on travel and adventure experiences, particularly highlighting the beautiful destinations and activities in the Philippines. Users can share their travel experiences, discover new adventures, follow other travelers, and book events.</p>
<h2 id="key-features">🚀 Key Features</h2>
<ul>
<li><strong>📱 Social Feed</strong>: Discover posts and events from other travelers</li>
<li><strong>🗓️ Event Management</strong>: Create and manage travel events with detailed itineraries</li>
<li><strong>👥 Follow System</strong>: Follow other travelers to see their content</li>
<li><strong>📝 Content Sharing</strong>: Share text posts, images, and experiences</li>
<li><strong>🎫 Booking System</strong>: Book slots for events and adventures</li>
<li><strong>🔍 Discovery</strong>: Find trending and popular content</li>
</ul>
<h2 id="api-overview">📋 API Overview</h2>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8080</code>
</aside>
<p>This API provides endpoints for:</p>
<ul>
<li><strong>Authentication</strong>: User registration, login, and logout</li>
<li><strong>Events</strong>: Create, read, update, and delete travel events</li>
<li><strong>Posts</strong>: Share and manage travel experiences</li>
<li><strong>Bookings</strong>: Handle event reservations</li>
<li><strong>Follow System</strong>: Manage user relationships</li>
<li><strong>Feed</strong>: Get personalized content feed</li>
</ul>
<h2 id="authentication">🔐 Authentication</h2>
<p>Most endpoints require authentication using Laravel Sanctum. See the <a href="#authentication">Authentication</a> section for details.</p>
<h2 id="getting-started">📚 Getting Started</h2>
<ol>
<li><strong>Register</strong> a new account or <strong>login</strong> with existing credentials</li>
<li><strong>Get your token</strong> from the authentication response</li>
<li><strong>Include the token</strong> in the <code>Authorization</code> header for protected endpoints</li>
<li><strong>Start exploring</strong> the API endpoints!</li>
</ol>
<h2 id="example-workflow">🌟 Example Workflow</h2>
<pre><code class="language-bash"># 1. Register a new user
POST /api/auth/register
{
    "name": "Adventure Seeker",
    "email": "adventurer@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}

# 2. Use the returned token for authenticated requests
Authorization: Bearer 1|abc123def456ghi789...

# 3. Create a travel event
POST /api/events
{
    "title": "Baguio Mountain Trek",
    "description": "Amazing mountain trekking experience",
    "location": "Baguio, Philippines",
    "start_date": "2024-01-15",
    "price": 1500
}

# 4. Share your experience
POST /api/posts
{
    "content": "Just completed an amazing trek!",
    "type": "text"
}</code></pre>
<aside>
    <strong>💡 Pro Tip</strong>: Use the interactive testing feature to try endpoints directly from this documentation!
</aside>

        <h1 id="authentication">Authentication</h1>
<p>This API uses <strong>Laravel Sanctum</strong> for authentication. Most endpoints require authentication via Bearer token.</p>
<aside class="notice">
<strong>🔒 Local Access Only</strong>: This documentation is only accessible from localhost and local network IPs for security reasons.
</aside>
<h2 id="how-to-authenticate">How to Authenticate</h2>
<h3 id="1-register-or-login">1. Register or Login</h3>
<p>First, you need to register a new user or login with existing credentials:</p>
<p><strong>Register:</strong></p>
<pre><code class="language-bash">POST /api/auth/register
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}</code></pre>
<p><strong>Login:</strong></p>
<pre><code class="language-bash">POST /api/auth/login
{
    "email": "john@example.com",
    "password": "password123"
}</code></pre>
<h3 id="2-get-your-token">2. Get Your Token</h3>
<p>Both registration and login will return a token:</p>
<pre><code class="language-json">{
    "message": "User registered successfully",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com"
    },
    "token": "1|abc123def456ghi789..."
}</code></pre>
<h3 id="3-use-the-token">3. Use the Token</h3>
<p>Include the token in the <code>Authorization</code> header for protected endpoints:</p>
<pre><code class="language-bash">Authorization: Bearer 1|abc123def456ghi789...</code></pre>
<h2 id="protected-endpoints">Protected Endpoints</h2>
<p>The following endpoints require authentication:</p>
<ul>
<li>All <code>/api/events/*</code> endpoints (except public listing)</li>
<li>All <code>/api/posts/*</code> endpoints</li>
<li>All <code>/api/bookings/*</code> endpoints</li>
<li>All <code>/api/follow/*</code> endpoints</li>
<li>All <code>/api/feed/*</code> endpoints</li>
<li><code>/api/auth/user</code></li>
<li><code>/api/auth/logout</code></li>
</ul>
<h2 id="public-endpoints">Public Endpoints</h2>
<p>These endpoints don't require authentication:</p>
<ul>
<li><code>GET /api/health</code></li>
<li><code>POST /api/auth/register</code></li>
<li><code>POST /api/auth/login</code></li>
<li><code>GET /api/events</code> (public listing)</li>
</ul>
<h2 id="token-expiration">Token Expiration</h2>
<p>Tokens don't expire by default, but you can logout to invalidate them:</p>
<pre><code class="language-bash">POST /api/auth/logout
Authorization: Bearer your_token_here</code></pre>

        <h1 id="authentication">Authentication</h1>

    <p>APIs for user authentication and registration</p>

                                <h2 id="authentication-POSTapi-auth-register">Register a new user</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"John Doe\",
    \"email\": \"john@example.com\",
    \"password\": \"password123\",
    \"password_confirmation\": \"password123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;User registered successfully&quot;,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;email&quot;: &quot;john@example.com&quot;,
        &quot;created_at&quot;: &quot;2024-01-01T00:00:00.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-01-01T00:00:00.000000Z&quot;
    },
    &quot;token&quot;: &quot;1|abc123def456ghi789jkl012mno345pqr678stu901vwx234yz&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email has already been taken.&quot;
        ],
        &quot;password&quot;: [
            &quot;The password confirmation does not match.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-auth-register"
               value="John Doe"
               data-component="body">
    <br>
<p>User's full name. Example: <code>John Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-register"
               value="john@example.com"
               data-component="body">
    <br>
<p>User's email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-register"
               value="password123"
               data-component="body">
    <br>
<p>User's password (minimum 8 characters). Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-auth-register"
               value="password123"
               data-component="body">
    <br>
<p>Password confirmation. Example: <code>password123</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-auth-login">Login user</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"john@example.com\",
    \"password\": \"password123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john@example.com",
    "password": "password123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Login successful&quot;,
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;email&quot;: &quot;john@example.com&quot;,
        &quot;is_admin&quot;: false,
        &quot;created_at&quot;: &quot;2024-01-01T00:00:00.000000Z&quot;
    },
    &quot;token&quot;: &quot;1|abc123def456ghi789jkl012mno345pqr678stu901vwx234yz&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid credentials&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email field is required.&quot;
        ],
        &quot;password&quot;: [
            &quot;The password field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="john@example.com"
               data-component="body">
    <br>
<p>User's email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="password123"
               data-component="body">
    <br>
<p>User's password. Example: <code>password123</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-auth-logout">Logout user</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="authentication-GETapi-auth-user">Get authenticated user</h2>

<p>
</p>



<span id="example-requests-GETapi-auth-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/auth/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/auth/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-auth-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-auth-user" data-method="GET"
      data-path="api/auth/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-user"
                    onclick="tryItOut('GETapi-auth-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-user"
                    onclick="cancelTryOut('GETapi-auth-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-auth-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-auth-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-health">GET api/health</h2>

<p>
</p>



<span id="example-requests-GETapi-health">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/health" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/health"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-health">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;ok&quot;,
    &quot;message&quot;: &quot;API is running&quot;,
    &quot;timestamp&quot;: &quot;2025-10-17T01:41:55.140215Z&quot;,
    &quot;version&quot;: &quot;1.0.10&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-health" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-health"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-health"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-health" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-health">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-health" data-method="GET"
      data-path="api/health"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-health', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-health"
                    onclick="tryItOut('GETapi-health');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-health"
                    onclick="cancelTryOut('GETapi-health');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-health"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/health</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-health"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-health"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-events">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/events" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-events">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 14,
                &quot;title&quot;: &quot;Manila Food Tour&quot;,
                &quot;description&quot;: &quot;Embark on a culinary journey through Manila&#039;s best food spots! Taste authentic Filipino dishes, visit local markets, and learn about the rich food culture of the Philippines.&quot;,
                &quot;location&quot;: &quot;Manila, Metro Manila&quot;,
                &quot;latitude&quot;: &quot;14.59950000&quot;,
                &quot;longitude&quot;: &quot;120.98420000&quot;,
                &quot;start_date&quot;: &quot;2025-10-19T14:30:30.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-19T14:30:30.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T18:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T22:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Food&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 15,
                &quot;price&quot;: &quot;1200.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;6:00 PM - Meet at Binondo&quot;,
                    &quot;6:30 PM - Chinese-Filipino food tasting&quot;,
                    &quot;7:30 PM - Visit Quiapo market&quot;,
                    &quot;8:00 PM - Street food adventure&quot;,
                    &quot;9:00 PM - Traditional Filipino dinner&quot;,
                    &quot;10:00 PM - Dessert and coffee&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable walking shoes&quot;,
                    &quot;Empty stomach!&quot;,
                    &quot;Camera for food photos&quot;
                ],
                &quot;user_id&quot;: 8,
                &quot;created_at&quot;: &quot;2025-10-16T14:30:31.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T14:30:31.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 8,
                    &quot;name&quot;: &quot;Ana Cruz&quot;,
                    &quot;email&quot;: &quot;ana.cruz@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: false,
                    &quot;created_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 29,
                &quot;title&quot;: &quot;Manila Food Tour&quot;,
                &quot;description&quot;: &quot;Embark on a culinary journey through Manila&#039;s best food spots! Taste authentic Filipino dishes, visit local markets, and learn about the rich food culture of the Philippines.&quot;,
                &quot;location&quot;: &quot;Manila, Metro Manila&quot;,
                &quot;latitude&quot;: &quot;14.59950000&quot;,
                &quot;longitude&quot;: &quot;120.98420000&quot;,
                &quot;start_date&quot;: &quot;2025-10-19T15:23:02.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-19T15:23:02.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T18:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T22:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Food&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 15,
                &quot;price&quot;: &quot;1200.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;6:00 PM - Meet at Binondo&quot;,
                    &quot;6:30 PM - Chinese-Filipino food tasting&quot;,
                    &quot;7:30 PM - Visit Quiapo market&quot;,
                    &quot;8:00 PM - Street food adventure&quot;,
                    &quot;9:00 PM - Traditional Filipino dinner&quot;,
                    &quot;10:00 PM - Dessert and coffee&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable walking shoes&quot;,
                    &quot;Empty stomach!&quot;,
                    &quot;Camera for food photos&quot;
                ],
                &quot;user_id&quot;: 14,
                &quot;created_at&quot;: &quot;2025-10-16T15:23:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T15:23:02.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 14,
                    &quot;name&quot;: &quot;Elena Rodriguez&quot;,
                    &quot;email&quot;: &quot;elena.rodriguez@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: false,
                    &quot;created_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 49,
                &quot;title&quot;: &quot;Manila Food Tour&quot;,
                &quot;description&quot;: &quot;Embark on a culinary journey through Manila&#039;s best food spots! Taste authentic Filipino dishes, visit local markets, and learn about the rich food culture of the Philippines.&quot;,
                &quot;location&quot;: &quot;Manila, Metro Manila&quot;,
                &quot;latitude&quot;: &quot;14.59950000&quot;,
                &quot;longitude&quot;: &quot;120.98420000&quot;,
                &quot;start_date&quot;: &quot;2025-10-19T15:30:33.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-19T15:30:33.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T18:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T22:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Food&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1544551763-46a013bb2dcc?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 15,
                &quot;price&quot;: &quot;1200.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;6:00 PM - Meet at Binondo&quot;,
                    &quot;6:30 PM - Chinese-Filipino food tasting&quot;,
                    &quot;7:30 PM - Visit Quiapo market&quot;,
                    &quot;8:00 PM - Street food adventure&quot;,
                    &quot;9:00 PM - Traditional Filipino dinner&quot;,
                    &quot;10:00 PM - Dessert and coffee&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable walking shoes&quot;,
                    &quot;Empty stomach!&quot;,
                    &quot;Camera for food photos&quot;
                ],
                &quot;user_id&quot;: 5,
                &quot;created_at&quot;: &quot;2025-10-16T15:30:33.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T15:30:33.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Adventure Guide&quot;,
                    &quot;email&quot;: &quot;guide@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: false,
                    &quot;created_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 2,
                &quot;title&quot;: &quot;Baguio Mountain Adventure&quot;,
                &quot;description&quot;: &quot;Experience the cool climate and stunning mountain views of Baguio City. We&#039;ll visit Mines View Park, Burnham Park, and the famous strawberry farms. Perfect for nature lovers and photography enthusiasts.&quot;,
                &quot;location&quot;: &quot;Baguio City, Benguet&quot;,
                &quot;latitude&quot;: &quot;16.40230000&quot;,
                &quot;longitude&quot;: &quot;120.59600000&quot;,
                &quot;start_date&quot;: &quot;2025-10-23T13:20:58.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-24T13:20:58.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T06:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T18:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Adventure&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 15,
                &quot;price&quot;: &quot;2500.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;6:00 AM - Meet at Victory Liner Terminal&quot;,
                    &quot;7:00 AM - Depart for Baguio&quot;,
                    &quot;12:00 PM - Arrive in Baguio, lunch at local restaurant&quot;,
                    &quot;2:00 PM - Visit Mines View Park&quot;,
                    &quot;4:00 PM - Explore Burnham Park&quot;,
                    &quot;6:00 PM - Check-in at hotel&quot;,
                    &quot;8:00 PM - Dinner and city tour&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable walking shoes&quot;,
                    &quot;Warm clothing&quot;,
                    &quot;Camera (optional)&quot;,
                    &quot;Personal medications&quot;
                ],
                &quot;user_id&quot;: 1,
                &quot;created_at&quot;: &quot;2025-10-16T13:20:58.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T13:20:58.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin User&quot;,
                    &quot;email&quot;: &quot;admin@taraapp.com&quot;,
                    &quot;email_verified_at&quot;: &quot;2025-10-11T03:47:41.000000Z&quot;,
                    &quot;is_admin&quot;: true,
                    &quot;created_at&quot;: &quot;2025-10-11T03:47:41.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-11T03:47:41.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 8,
                &quot;title&quot;: &quot;Baguio Mountain Adventure&quot;,
                &quot;description&quot;: &quot;Experience the cool climate and stunning mountain views of Baguio City. We&#039;ll visit Mines View Park, Burnham Park, and the famous strawberry farms. Perfect for nature lovers and photography enthusiasts.&quot;,
                &quot;location&quot;: &quot;Baguio City, Benguet&quot;,
                &quot;latitude&quot;: &quot;16.40230000&quot;,
                &quot;longitude&quot;: &quot;120.59600000&quot;,
                &quot;start_date&quot;: &quot;2025-10-23T14:30:30.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-24T14:30:30.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T06:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T18:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Adventure&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 15,
                &quot;price&quot;: &quot;2500.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;6:00 AM - Meet at Victory Liner Terminal&quot;,
                    &quot;7:00 AM - Depart for Baguio&quot;,
                    &quot;12:00 PM - Arrive in Baguio, lunch at local restaurant&quot;,
                    &quot;2:00 PM - Visit Mines View Park&quot;,
                    &quot;4:00 PM - Explore Burnham Park&quot;,
                    &quot;6:00 PM - Check-in at hotel&quot;,
                    &quot;8:00 PM - Dinner and city tour&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable walking shoes&quot;,
                    &quot;Warm clothing&quot;,
                    &quot;Camera (optional)&quot;,
                    &quot;Personal medications&quot;
                ],
                &quot;user_id&quot;: 15,
                &quot;created_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 15,
                    &quot;name&quot;: &quot;Admin User&quot;,
                    &quot;email&quot;: &quot;admin@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: true,
                    &quot;created_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 23,
                &quot;title&quot;: &quot;Baguio Mountain Adventure&quot;,
                &quot;description&quot;: &quot;Experience the cool climate and stunning mountain views of Baguio City. We&#039;ll visit Mines View Park, Burnham Park, and the famous strawberry farms. Perfect for nature lovers and photography enthusiasts.&quot;,
                &quot;location&quot;: &quot;Baguio City, Benguet&quot;,
                &quot;latitude&quot;: &quot;16.40230000&quot;,
                &quot;longitude&quot;: &quot;120.59600000&quot;,
                &quot;start_date&quot;: &quot;2025-10-23T15:23:02.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-24T15:23:02.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T06:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T18:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Adventure&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 15,
                &quot;price&quot;: &quot;2500.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;6:00 AM - Meet at Victory Liner Terminal&quot;,
                    &quot;7:00 AM - Depart for Baguio&quot;,
                    &quot;12:00 PM - Arrive in Baguio, lunch at local restaurant&quot;,
                    &quot;2:00 PM - Visit Mines View Park&quot;,
                    &quot;4:00 PM - Explore Burnham Park&quot;,
                    &quot;6:00 PM - Check-in at hotel&quot;,
                    &quot;8:00 PM - Dinner and city tour&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable walking shoes&quot;,
                    &quot;Warm clothing&quot;,
                    &quot;Camera (optional)&quot;,
                    &quot;Personal medications&quot;
                ],
                &quot;user_id&quot;: 1,
                &quot;created_at&quot;: &quot;2025-10-16T15:23:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T15:23:02.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Admin User&quot;,
                    &quot;email&quot;: &quot;admin@taraapp.com&quot;,
                    &quot;email_verified_at&quot;: &quot;2025-10-11T03:47:41.000000Z&quot;,
                    &quot;is_admin&quot;: true,
                    &quot;created_at&quot;: &quot;2025-10-11T03:47:41.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-11T03:47:41.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 43,
                &quot;title&quot;: &quot;Baguio Mountain Adventure&quot;,
                &quot;description&quot;: &quot;Experience the cool climate and stunning mountain views of Baguio City. We&#039;ll visit Mines View Park, Burnham Park, and the famous strawberry farms. Perfect for nature lovers and photography enthusiasts.&quot;,
                &quot;location&quot;: &quot;Baguio City, Benguet&quot;,
                &quot;latitude&quot;: &quot;16.40230000&quot;,
                &quot;longitude&quot;: &quot;120.59600000&quot;,
                &quot;start_date&quot;: &quot;2025-10-23T15:30:33.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-24T15:30:33.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T06:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T18:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Adventure&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 15,
                &quot;price&quot;: &quot;2500.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;6:00 AM - Meet at Victory Liner Terminal&quot;,
                    &quot;7:00 AM - Depart for Baguio&quot;,
                    &quot;12:00 PM - Arrive in Baguio, lunch at local restaurant&quot;,
                    &quot;2:00 PM - Visit Mines View Park&quot;,
                    &quot;4:00 PM - Explore Burnham Park&quot;,
                    &quot;6:00 PM - Check-in at hotel&quot;,
                    &quot;8:00 PM - Dinner and city tour&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable walking shoes&quot;,
                    &quot;Warm clothing&quot;,
                    &quot;Camera (optional)&quot;,
                    &quot;Personal medications&quot;
                ],
                &quot;user_id&quot;: 17,
                &quot;created_at&quot;: &quot;2025-10-16T15:30:33.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T15:30:33.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 17,
                    &quot;name&quot;: &quot;Mountain Climber&quot;,
                    &quot;email&quot;: &quot;climber@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: false,
                    &quot;created_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 1,
                &quot;title&quot;: &quot;Test to the moon&quot;,
                &quot;description&quot;: &quot;Test&quot;,
                &quot;location&quot;: &quot;Moon&quot;,
                &quot;latitude&quot;: null,
                &quot;longitude&quot;: null,
                &quot;start_date&quot;: &quot;2025-10-25T00:00:00.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-11-29T00:00:00.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T06:01:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T18:01:00.000000Z&quot;,
                &quot;category&quot;: &quot;Travel&quot;,
                &quot;image_url&quot;: null,
                &quot;max_attendees&quot;: 21,
                &quot;price&quot;: &quot;2.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;T3st1&quot;,
                    &quot;Test2&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Test&quot;
                ],
                &quot;user_id&quot;: 3,
                &quot;created_at&quot;: &quot;2025-10-16T10:02:32.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T10:02:32.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Aljay Mallari&quot;,
                    &quot;email&quot;: &quot;aljay.mallari@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: false,
                    &quot;created_at&quot;: &quot;2025-10-16T08:10:16.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T08:10:16.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 38,
                &quot;title&quot;: &quot;Palawan Underground River Tour&quot;,
                &quot;description&quot;: &quot;Explore one of the New 7 Wonders of Nature. Discover the stunning underground river with its magnificent limestone formations and diverse wildlife.&quot;,
                &quot;location&quot;: &quot;Puerto Princesa, Palawan&quot;,
                &quot;latitude&quot;: &quot;10.31570000&quot;,
                &quot;longitude&quot;: &quot;118.95590000&quot;,
                &quot;start_date&quot;: &quot;2025-10-26T15:23:03.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-28T15:23:03.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T08:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T17:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Sightseeing&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 20,
                &quot;price&quot;: &quot;3500.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;8:00 AM - Hotel pickup&quot;,
                    &quot;9:00 AM - Arrive at Sabang Wharf&quot;,
                    &quot;10:00 AM - Underground River tour&quot;,
                    &quot;12:00 PM - Lunch at local restaurant&quot;,
                    &quot;2:00 PM - Beach time at Sabang&quot;,
                    &quot;4:00 PM - Return to Puerto Princesa&quot;,
                    &quot;6:00 PM - Hotel drop-off&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable clothes&quot;,
                    &quot;Camera&quot;,
                    &quot;Sunscreen&quot;
                ],
                &quot;user_id&quot;: 12,
                &quot;created_at&quot;: &quot;2025-10-16T15:23:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T15:23:03.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 12,
                    &quot;name&quot;: &quot;Lisa Chen&quot;,
                    &quot;email&quot;: &quot;lisa.chen@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: false,
                    &quot;created_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;
                },
                &quot;bookings&quot;: []
            },
            {
                &quot;id&quot;: 58,
                &quot;title&quot;: &quot;Palawan Underground River Tour&quot;,
                &quot;description&quot;: &quot;Explore one of the New 7 Wonders of Nature. Discover the stunning underground river with its magnificent limestone formations and diverse wildlife.&quot;,
                &quot;location&quot;: &quot;Puerto Princesa, Palawan&quot;,
                &quot;latitude&quot;: &quot;10.31570000&quot;,
                &quot;longitude&quot;: &quot;118.95590000&quot;,
                &quot;start_date&quot;: &quot;2025-10-26T15:30:33.000000Z&quot;,
                &quot;end_date&quot;: &quot;2025-10-28T15:30:33.000000Z&quot;,
                &quot;start_time&quot;: &quot;2025-10-17T08:00:00.000000Z&quot;,
                &quot;end_time&quot;: &quot;2025-10-17T17:00:00.000000Z&quot;,
                &quot;category&quot;: &quot;Sightseeing&quot;,
                &quot;image_url&quot;: &quot;https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&amp;h=600&amp;fit=crop&quot;,
                &quot;max_attendees&quot;: 20,
                &quot;price&quot;: &quot;3500.00&quot;,
                &quot;is_live&quot;: false,
                &quot;is_active&quot;: true,
                &quot;itinerary&quot;: [
                    &quot;8:00 AM - Hotel pickup&quot;,
                    &quot;9:00 AM - Arrive at Sabang Wharf&quot;,
                    &quot;10:00 AM - Underground River tour&quot;,
                    &quot;12:00 PM - Lunch at local restaurant&quot;,
                    &quot;2:00 PM - Beach time at Sabang&quot;,
                    &quot;4:00 PM - Return to Puerto Princesa&quot;,
                    &quot;6:00 PM - Hotel drop-off&quot;
                ],
                &quot;requirements&quot;: [
                    &quot;Valid ID&quot;,
                    &quot;Comfortable clothes&quot;,
                    &quot;Camera&quot;,
                    &quot;Sunscreen&quot;
                ],
                &quot;user_id&quot;: 11,
                &quot;created_at&quot;: &quot;2025-10-16T15:30:33.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-10-16T15:30:33.000000Z&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 11,
                    &quot;name&quot;: &quot;Miguel Torres&quot;,
                    &quot;email&quot;: &quot;miguel.torres@tara.com&quot;,
                    &quot;email_verified_at&quot;: null,
                    &quot;is_admin&quot;: false,
                    &quot;created_at&quot;: &quot;2025-10-16T14:30:30.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-10-16T15:30:01.000000Z&quot;
                },
                &quot;bookings&quot;: []
            }
        ],
        &quot;first_page_url&quot;: &quot;http://localhost:8080/api/events?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 7,
        &quot;last_page_url&quot;: &quot;http://localhost:8080/api/events?page=7&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;page&quot;: 3,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;page&quot;: 4,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=5&quot;,
                &quot;label&quot;: &quot;5&quot;,
                &quot;page&quot;: 5,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=6&quot;,
                &quot;label&quot;: &quot;6&quot;,
                &quot;page&quot;: 6,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=7&quot;,
                &quot;label&quot;: &quot;7&quot;,
                &quot;page&quot;: 7,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: &quot;http://localhost:8080/api/events?page=2&quot;,
        &quot;path&quot;: &quot;http://localhost:8080/api/events&quot;,
        &quot;per_page&quot;: 10,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 10,
        &quot;total&quot;: 62
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-events" data-method="GET"
      data-path="api/events"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-events"
                    onclick="tryItOut('GETapi-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-events"
                    onclick="cancelTryOut('GETapi-events');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-events"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-events--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-events--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/events/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-events--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Test to the moon&quot;,
        &quot;description&quot;: &quot;Test&quot;,
        &quot;location&quot;: &quot;Moon&quot;,
        &quot;latitude&quot;: null,
        &quot;longitude&quot;: null,
        &quot;start_date&quot;: &quot;2025-10-25T00:00:00.000000Z&quot;,
        &quot;end_date&quot;: &quot;2025-11-29T00:00:00.000000Z&quot;,
        &quot;start_time&quot;: &quot;2025-10-17T06:01:00.000000Z&quot;,
        &quot;end_time&quot;: &quot;2025-10-17T18:01:00.000000Z&quot;,
        &quot;category&quot;: &quot;Travel&quot;,
        &quot;image_url&quot;: null,
        &quot;max_attendees&quot;: 21,
        &quot;price&quot;: &quot;2.00&quot;,
        &quot;is_live&quot;: false,
        &quot;is_active&quot;: true,
        &quot;itinerary&quot;: [
            &quot;T3st1&quot;,
            &quot;Test2&quot;
        ],
        &quot;requirements&quot;: [
            &quot;Test&quot;
        ],
        &quot;user_id&quot;: 3,
        &quot;created_at&quot;: &quot;2025-10-16T10:02:32.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-10-16T10:02:32.000000Z&quot;,
        &quot;user&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Aljay Mallari&quot;,
            &quot;email&quot;: &quot;aljay.mallari@tara.com&quot;,
            &quot;email_verified_at&quot;: null,
            &quot;is_admin&quot;: false,
            &quot;created_at&quot;: &quot;2025-10-16T08:10:16.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-10-16T08:10:16.000000Z&quot;
        },
        &quot;bookings&quot;: [],
        &quot;posts&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-events--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-events--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-events--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-events--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-events--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-events--id-" data-method="GET"
      data-path="api/events/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-events--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-events--id-"
                    onclick="tryItOut('GETapi-events--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-events--id-"
                    onclick="cancelTryOut('GETapi-events--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-events--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/events/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-events--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-events">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/events" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-events">
</span>
<span id="execution-results-POSTapi-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-events" data-method="POST"
      data-path="api/events"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-events"
                    onclick="tryItOut('POSTapi-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-events"
                    onclick="cancelTryOut('POSTapi-events');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-events"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-events--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-events--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/events/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-events--id-">
</span>
<span id="execution-results-PUTapi-events--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-events--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-events--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-events--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-events--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-events--id-" data-method="PUT"
      data-path="api/events/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-events--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-events--id-"
                    onclick="tryItOut('PUTapi-events--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-events--id-"
                    onclick="cancelTryOut('PUTapi-events--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-events--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/events/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-events--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-events--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-events--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/events/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-events--id-">
</span>
<span id="execution-results-DELETEapi-events--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-events--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-events--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-events--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-events--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-events--id-" data-method="DELETE"
      data-path="api/events/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-events--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-events--id-"
                    onclick="tryItOut('DELETEapi-events--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-events--id-"
                    onclick="cancelTryOut('DELETEapi-events--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-events--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/events/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-events--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-events-my-events">Get user&#039;s events</h2>

<p>
</p>



<span id="example-requests-GETapi-events-my-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/events/my-events" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events/my-events"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-events-my-events">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Event not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-events-my-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-events-my-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-events-my-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-events-my-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-events-my-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-events-my-events" data-method="GET"
      data-path="api/events/my-events"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-events-my-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-events-my-events"
                    onclick="tryItOut('GETapi-events-my-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-events-my-events"
                    onclick="cancelTryOut('GETapi-events-my-events');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-events-my-events"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/events/my-events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-events-my-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-events-my-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-posts">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/posts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-posts">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-posts" data-method="GET"
      data-path="api/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-posts"
                    onclick="tryItOut('GETapi-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-posts"
                    onclick="cancelTryOut('GETapi-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-posts">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/posts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-posts">
</span>
<span id="execution-results-POSTapi-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-posts" data-method="POST"
      data-path="api/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-posts"
                    onclick="tryItOut('POSTapi-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-posts"
                    onclick="cancelTryOut('POSTapi-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-posts--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-posts--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-posts--id-" data-method="GET"
      data-path="api/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-posts--id-"
                    onclick="tryItOut('GETapi-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-posts--id-"
                    onclick="cancelTryOut('GETapi-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-posts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-posts--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-posts--id-">
</span>
<span id="execution-results-PUTapi-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-posts--id-" data-method="PUT"
      data-path="api/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-posts--id-"
                    onclick="tryItOut('PUTapi-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-posts--id-"
                    onclick="cancelTryOut('PUTapi-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-posts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/posts/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-posts--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-posts--id-">
</span>
<span id="execution-results-DELETEapi-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-posts--id-" data-method="DELETE"
      data-path="api/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-posts--id-"
                    onclick="tryItOut('DELETEapi-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-posts--id-"
                    onclick="cancelTryOut('DELETEapi-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-posts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-bookings">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-bookings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/bookings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/bookings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-bookings">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-bookings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-bookings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-bookings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-bookings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-bookings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-bookings" data-method="GET"
      data-path="api/bookings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-bookings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-bookings"
                    onclick="tryItOut('GETapi-bookings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-bookings"
                    onclick="cancelTryOut('GETapi-bookings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-bookings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/bookings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-bookings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-bookings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-bookings">Store a newly created resource in storage.</h2>

<p>
</p>



<span id="example-requests-POSTapi-bookings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/bookings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/bookings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-bookings">
</span>
<span id="execution-results-POSTapi-bookings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-bookings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-bookings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-bookings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-bookings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-bookings" data-method="POST"
      data-path="api/bookings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-bookings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-bookings"
                    onclick="tryItOut('POSTapi-bookings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-bookings"
                    onclick="cancelTryOut('POSTapi-bookings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-bookings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/bookings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-bookings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-bookings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-bookings--id-">Display the specified resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-bookings--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/bookings/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/bookings/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-bookings--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-bookings--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-bookings--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-bookings--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-bookings--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-bookings--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-bookings--id-" data-method="GET"
      data-path="api/bookings/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-bookings--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-bookings--id-"
                    onclick="tryItOut('GETapi-bookings--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-bookings--id-"
                    onclick="cancelTryOut('GETapi-bookings--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-bookings--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/bookings/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-bookings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-bookings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-bookings--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the booking. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-bookings--id-">Update the specified resource in storage.</h2>

<p>
</p>



<span id="example-requests-PUTapi-bookings--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/bookings/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/bookings/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-bookings--id-">
</span>
<span id="execution-results-PUTapi-bookings--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-bookings--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-bookings--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-bookings--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-bookings--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-bookings--id-" data-method="PUT"
      data-path="api/bookings/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-bookings--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-bookings--id-"
                    onclick="tryItOut('PUTapi-bookings--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-bookings--id-"
                    onclick="cancelTryOut('PUTapi-bookings--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-bookings--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/bookings/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/bookings/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-bookings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-bookings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-bookings--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the booking. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-bookings--id-">Remove the specified resource from storage.</h2>

<p>
</p>



<span id="example-requests-DELETEapi-bookings--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/bookings/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/bookings/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-bookings--id-">
</span>
<span id="execution-results-DELETEapi-bookings--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-bookings--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-bookings--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-bookings--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-bookings--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-bookings--id-" data-method="DELETE"
      data-path="api/bookings/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-bookings--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-bookings--id-"
                    onclick="tryItOut('DELETEapi-bookings--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-bookings--id-"
                    onclick="cancelTryOut('DELETEapi-bookings--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-bookings--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/bookings/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-bookings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-bookings--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-bookings--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the booking. Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-protected">GET api/protected</h2>

<p>
</p>



<span id="example-requests-GETapi-protected">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/protected" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/protected"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-protected">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: Origin
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-protected" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-protected"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-protected"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-protected" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-protected">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-protected" data-method="GET"
      data-path="api/protected"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-protected', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-protected"
                    onclick="tryItOut('GETapi-protected');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-protected"
                    onclick="cancelTryOut('GETapi-protected');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-protected"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/protected</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-protected"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-protected"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="feed">Feed</h1>

    <p>APIs for managing user feed</p>

                                <h2 id="feed-GETapi-feed">Get personalized feed for the authenticated user</h2>

<p>
</p>



<span id="example-requests-GETapi-feed">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/feed?page=1&amp;per_page=20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/feed"
);

const params = {
    "page": "1",
    "per_page": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-feed">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;type&quot;: &quot;post&quot;,
                &quot;content&quot;: &quot;Amazing adventure!&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;John Doe&quot;
                },
                &quot;created_at&quot;: &quot;2024-01-01T00:00:00.000000Z&quot;
            }
        ],
        &quot;pagination&quot;: {
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 10,
            &quot;per_page&quot;: 20,
            &quot;total&quot;: 200
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-feed" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-feed"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-feed"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-feed" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-feed">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-feed" data-method="GET"
      data-path="api/feed"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-feed', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-feed"
                    onclick="tryItOut('GETapi-feed');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-feed"
                    onclick="cancelTryOut('GETapi-feed');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-feed"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/feed</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-feed"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-feed"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-feed"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-feed"
               value="20"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>20</code></p>
            </div>
                </form>

                <h1 id="feed-discovery">Feed Discovery</h1>

    <p>APIs for discovering new events and content</p>

                                <h2 id="feed-discovery-GETapi-feed-discover">Discover new events and content</h2>

<p>
</p>



<span id="example-requests-GETapi-feed-discover">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/feed/discover?category=Travel&amp;location=Baguio&amp;page=1&amp;per_page=20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/feed/discover"
);

const params = {
    "category": "Travel",
    "location": "Baguio",
    "page": "1",
    "per_page": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-feed-discover">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;title&quot;: &quot;Baguio Mountain Trek&quot;,
                &quot;description&quot;: &quot;Amazing mountain trekking experience&quot;,
                &quot;location&quot;: &quot;Baguio, Philippines&quot;,
                &quot;start_date&quot;: &quot;2024-01-15&quot;,
                &quot;category&quot;: &quot;Adventure&quot;,
                &quot;user&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;John Doe&quot;
                }
            }
        ],
        &quot;pagination&quot;: {
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 5,
            &quot;per_page&quot;: 20,
            &quot;total&quot;: 100
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-feed-discover" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-feed-discover"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-feed-discover"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-feed-discover" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-feed-discover">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-feed-discover" data-method="GET"
      data-path="api/feed/discover"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-feed-discover', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-feed-discover"
                    onclick="tryItOut('GETapi-feed-discover');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-feed-discover"
                    onclick="cancelTryOut('GETapi-feed-discover');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-feed-discover"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/feed/discover</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-feed-discover"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-feed-discover"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="GETapi-feed-discover"
               value="Travel"
               data-component="query">
    <br>
<p>Filter by event category. Example: <code>Travel</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="GETapi-feed-discover"
               value="Baguio"
               data-component="query">
    <br>
<p>Filter by location. Example: <code>Baguio</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-feed-discover"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-feed-discover"
               value="20"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>20</code></p>
            </div>
                </form>

                <h1 id="follow">Follow</h1>

    <p>APIs for managing follow relationships</p>

                                <h2 id="follow-GETapi-follow">Get follow relationships overview</h2>

<p>
</p>



<span id="example-requests-GETapi-follow">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/follow" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/follow"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-follow">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;followers_count&quot;: 15,
        &quot;following_count&quot;: 8,
        &quot;recent_followers&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;John Doe&quot;,
                &quot;email&quot;: &quot;john@example.com&quot;
            }
        ],
        &quot;recent_following&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Jane Smith&quot;,
                &quot;email&quot;: &quot;jane@example.com&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-follow" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-follow"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-follow"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-follow" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-follow">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-follow" data-method="GET"
      data-path="api/follow"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-follow', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-follow"
                    onclick="tryItOut('GETapi-follow');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-follow"
                    onclick="cancelTryOut('GETapi-follow');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-follow"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/follow</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-follow"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-follow"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="follow-actions">Follow Actions</h1>

    <p>APIs for following and unfollowing users</p>

                                <h2 id="follow-actions-POSTapi-follow">Follow a user</h2>

<p>
</p>



<span id="example-requests-POSTapi-follow">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/follow" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/follow"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-follow">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Successfully followed user&quot;,
    &quot;data&quot;: {
        &quot;is_following&quot;: true,
        &quot;followers_count&quot;: 15
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;You cannot follow yourself&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-follow" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-follow"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-follow"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-follow" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-follow">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-follow" data-method="POST"
      data-path="api/follow"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-follow', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-follow"
                    onclick="tryItOut('POSTapi-follow');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-follow"
                    onclick="cancelTryOut('POSTapi-follow');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-follow"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/follow</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-follow"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-follow"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="POSTapi-follow"
               value="1"
               data-component="body">
    <br>
<p>ID of the user to follow. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="follow-actions-DELETEapi-follow">Unfollow a user</h2>

<p>
</p>



<span id="example-requests-DELETEapi-follow">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/follow" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"user_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/follow"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1
};

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-follow">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Successfully unfollowed user&quot;,
    &quot;data&quot;: {
        &quot;is_following&quot;: false,
        &quot;followers_count&quot;: 14
    }
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-follow" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-follow"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-follow"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-follow" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-follow">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-follow" data-method="DELETE"
      data-path="api/follow"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-follow', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-follow"
                    onclick="tryItOut('DELETEapi-follow');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-follow"
                    onclick="cancelTryOut('DELETEapi-follow');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-follow"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/follow</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-follow"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-follow"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="DELETEapi-follow"
               value="1"
               data-component="body">
    <br>
<p>ID of the user to unfollow. Example: <code>1</code></p>
        </div>
        </form>

                <h1 id="follow-lists">Follow Lists</h1>

    <p>APIs for managing follow relationships and lists</p>

                                <h2 id="follow-lists-GETapi-follow-followers">Get followers list</h2>

<p>
</p>



<span id="example-requests-GETapi-follow-followers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/follow/followers?page=1&amp;per_page=20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/follow/followers"
);

const params = {
    "page": "1",
    "per_page": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-follow-followers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;John Doe&quot;,
                &quot;email&quot;: &quot;john@example.com&quot;,
                &quot;created_at&quot;: &quot;2024-01-01T00:00:00.000000Z&quot;
            }
        ],
        &quot;pagination&quot;: {
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 5,
            &quot;per_page&quot;: 20,
            &quot;total&quot;: 100
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-follow-followers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-follow-followers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-follow-followers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-follow-followers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-follow-followers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-follow-followers" data-method="GET"
      data-path="api/follow/followers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-follow-followers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-follow-followers"
                    onclick="tryItOut('GETapi-follow-followers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-follow-followers"
                    onclick="cancelTryOut('GETapi-follow-followers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-follow-followers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/follow/followers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-follow-followers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-follow-followers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-follow-followers"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-follow-followers"
               value="20"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>20</code></p>
            </div>
                </form>

                    <h2 id="follow-lists-GETapi-follow-following">Get following list</h2>

<p>
</p>



<span id="example-requests-GETapi-follow-following">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/follow/following?page=1&amp;per_page=20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/follow/following"
);

const params = {
    "page": "1",
    "per_page": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-follow-following">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;data&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Jane Smith&quot;,
                &quot;email&quot;: &quot;jane@example.com&quot;,
                &quot;created_at&quot;: &quot;2024-01-01T00:00:00.000000Z&quot;
            }
        ],
        &quot;pagination&quot;: {
            &quot;current_page&quot;: 1,
            &quot;last_page&quot;: 3,
            &quot;per_page&quot;: 20,
            &quot;total&quot;: 50
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-follow-following" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-follow-following"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-follow-following"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-follow-following" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-follow-following">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-follow-following" data-method="GET"
      data-path="api/follow/following"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-follow-following', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-follow-following"
                    onclick="tryItOut('GETapi-follow-following');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-follow-following"
                    onclick="cancelTryOut('GETapi-follow-following');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-follow-following"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/follow/following</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-follow-following"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-follow-following"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-follow-following"
               value="1"
               data-component="query">
    <br>
<p>Page number for pagination. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>per_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="per_page"                data-endpoint="GETapi-follow-following"
               value="20"
               data-component="query">
    <br>
<p>Number of items per page. Example: <code>20</code></p>
            </div>
                </form>

                <h1 id="follow-status">Follow Status</h1>

    <p>APIs for checking follow status between users</p>

                                <h2 id="follow-status-GETapi-follow-status">Check follow status</h2>

<p>
</p>



<span id="example-requests-GETapi-follow-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/follow/status?user_id=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/follow/status"
);

const params = {
    "user_id": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-follow-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;is_following&quot;: true,
        &quot;followers_count&quot;: 15,
        &quot;following_count&quot;: 8
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-follow-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-follow-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-follow-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-follow-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-follow-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-follow-status" data-method="GET"
      data-path="api/follow/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-follow-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-follow-status"
                    onclick="tryItOut('GETapi-follow-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-follow-status"
                    onclick="cancelTryOut('GETapi-follow-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-follow-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/follow/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-follow-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-follow-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETapi-follow-status"
               value="1"
               data-component="query">
    <br>
<p>ID of the user to check status with. Example: <code>1</code></p>
            </div>
                </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
