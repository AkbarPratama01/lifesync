<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\TodolistController;
use App\Models\Todo;

class TodolistControllerTest extends TestCase
{
    public function testIndex2ReturnsCorrectViewWithData()
    {
        // Mock the session to simulate a logged-in user
        $_SESSION['user_id'] = 1;

        // Mock the Todo model
        $todoMock = $this->getMockBuilder(Todo::class)
                         ->disableOriginalConstructor()
                         ->getMock();
        
        // Return mocked data for the Todo::where() method
        $todoMock->expects($this->once())
                 ->method('where')
                 ->willReturn($todoMock);
        
        $todoMock->expects($this->once())
                 ->method('get')
                 ->willReturn([ (object)['task' => 'Test Task 1'], (object)['task' => 'Test Task 2'] ]);

        // Replace Todo with the mock version
        $controller = new TodolistController();
        
        // Call the index2 method to get the output
        $result = $controller->index2();

        // Assert that the result contains the expected output
        $this->assertStringContainsString("<h1>To-Do List</h1>", $result);
        $this->assertStringContainsString("Test Task 1", $result);
        $this->assertStringContainsString("Test Task 2", $result);
    }
}