

<body>
<div id="app">
    <img src="https://source.unsplash.com/collection/994704" class="featured__img" alt="Photo Of Trip to Japan">
    <div class="featured__details">
        <div class="featured__user"></div>
        <h1>Liliana B</h1>
    </div>
    <div class="comments">
        <ul>
            <li is="app-comment" v-for="comment in comments" :key="comment" :comment="comment">


            </li>
        </ul>
        <div class="contribute">
            <label for="add-comment">Add a comment</label><small>Press enter key to add</small>
            <input type="text" id="add-comment" v-model="newComment" @keyup.enter="submitComment"></input>
        </div>
    </div>
</div>
<script type="text/x-template" id="commentTemplate">
    <li>
        <div class="user__detail">
            <div v-bind:style="{ 'background-image': comment.authorImg }" class="user__avatar"></div>
            <span class="user__name">{{ comment.author }}</span>
        </div>
        <p>{{ comment.text }}</p>
    </li>
</script>
</body>

<style>
    $grey: #6c7a89;
    body {
        background-color: $grey;
        font-family: "Fira Sans", sans-serif;
    }
    #app {
        display: flex;
        flex-wrap: wrap;
        max-width: 40%;
        margin: 0 auto;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 4px 8px 20px -8px rgba(0, 0, 0, 0.58);
        .featured__img {
            max-width: 100%;
            border-radius: 4px;
            position: relative;
            flex: 1 100%;
        }
        .featured__details {
            flex: 1 100%;
            position: relative;
        }
        .featured__user {
            background-image: url(https://source.unsplash.com/collection/1059968);
            height: 80px;
            width: 80px;
            border-radius: 50%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border: 3px solid white;
            position: relative;
            top: -40px;
            left: 10px;
        }
        h1 {
            font-family: "Bitter", serif;
            position: absolute;
            top: -9px;
            left: 105px;
            font-size: 25px;
            color: #111;
        }
        .comments {
            width: 100%;
            ul {
                list-style: none;
                margin: 0;
                padding: 0;
                display: block;
            }
            li {
                border-bottom: 1px solid #ECECEC;
                &:last-of-type {
                    border-bottom: none;
                }
            }
            p {
                padding-left: 40px;
                margin-top: 0;
            }
        }

        .user__detail {
            display: flex;
            align-items: center;
            padding-top: 15px;
        }
        .user__avatar {
            background-image: url(https://source.unsplash.com/collection/181462);
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
        }
        .user__name {
            font-family: "Bitter", serif;
            padding: 0 10px;
            font-size: 17px;
            font-weight: bold;
        }
        .contribute {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
        }
        label {
            flex: 1 100%;
            text-align: center;
            padding: 20px 0 0;
            font-weight: bold;
        }
        small {
            padding: 5px 0 10px;
            font-style: oblique;
            font-size: 12px;
        }
        input {
            -webkit-appearance: none;
            appearance: none;
            border: 1px solid grey;
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 5px;
            font-family: "Bitter", serif;
        }
    }

</style>

