<?php

//Other
View::composer('partials/pages.message', 'MessageComposer');
View::composer('partials/pages/post.post', 'PostComposer');
View::composer('partials.home', 'HomeComposer');

//User
View::composer('partials/pages/user.viewProfiles', 'ViewProfilesComposer');
View::composer('partials/pages/user.profile', 'ProfileComposer');
View::composer('partials/pages/user.notifications', 'NotificationComposer');

//Topics
View::composer('partials/pages/topic.topics', 'TopicsComposer');
View::composer('partials/pages/topic.viewTopics', 'ViewTopicsComposer');
View::composer('partials/pages/topic.topic', 'TopicComposer');
View::composer('partials/pages/topic.new', 'NewComposer');
View::composer('partials/pages/topic.halloffame', 'HalloffameComposer');
View::composer('partials/pages/topic.popular', 'PopularComposer');
View::composer('partials/pages/topic.profilePosts', 'ProfilePostsComposer');