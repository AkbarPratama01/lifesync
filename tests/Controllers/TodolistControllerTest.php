<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\TodolistController;

class TodolistControllerTest extends TestCase
{
    public function testIndex2ReturnsCorrectView()
    {
        // Mock the session to simulate a logged-in user
        $_SESSION['user_id'] = 1; // Simulate a user being logged in

        // Create a mock controller instance
        $controller = new TodolistController();
        
        // Call the index2 method to get the output
        $result = $controller->index2();

        // Assert that the result contains the expected output
        $this->assertStringContainsString("<h1>To-Do List</h1>", $result);
    }
}