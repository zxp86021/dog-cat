<?php

return [

    'the_dog' => [
        /**
         * API Key For TheDogApi
         * More Detail: https://docs.thedogapi.com/authentication
         */
        'api_key' => env('THE_DOG_API_KEY','YOUR_DOG_API_KEY')
    ],

    'the_cat' => [
        /**
         * API Key For TheCatApi
         * More Detail: https://docs.thecatapi.com/authentication
         */
        'api_key' => env('THE_CAT_API_KEY','YOUR_CAT_API_KEY')
    ],

];