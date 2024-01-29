<?php

// app/Helpers.php

use App\Models\DailyQuestion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

// Function to get YouTube Video ID from the video link
function getYoutubeVideoId($url)
{
    $videoId = '';
    $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    if (preg_match($pattern, $url, $match)) {
        $videoId = $match[1];
    }

    return $videoId;
}

// Function to get YouTube Embed URL from the video link
function getYoutubeEmbedUrl($url)
{
    $videoId = getYoutubeVideoId($url);
    $embedUrl = "https://www.youtube.com/embed/{$videoId}";

    return $embedUrl;
}


function getRandomQuestion()
{
    // Assuming you have a DailyQuestion model with an 'id' column
    $currentDay = Carbon::now()->day;

    // Check if the question for the current day is already cached
    $dailyQuestion = Cache::remember('daily_question_' . $currentDay, now()->addDay(), function () {
        // If not cached, retrieve the question and cache it for the next day
        return DailyQuestion::with('dailyOptions')->inRandomOrder()->first();
    });
   

    return $dailyQuestion; // Add this line to return the value
}
