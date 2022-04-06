<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use App\Classes\Repositories\CategoryRepository;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    protected $category;

    public function setUp() : void
    {
        parent::setUp();
        $this->faker = Faker::create();
        // chuẩn bị dữ liệu test
        $this->category = [
            'name' => $this->faker->name,
            'description' => $this->faker->name,
        ];
        // khởi tạo lớp CategoryRepository
        $this->categoryRepository = new CategoryRepository();
    }

    public function tearDown() : void
    {
        parent::tearDown();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function testStore()
    // {
    //     // Gọi hàm tạo
    //     $category = $this->categoryRepository->create($this->category);
    //     // Kiểm tra xem kết quả trả về có là thể hiện của lớp Category hay không
    //     $this->assertInstanceOf(Category::class, $category);
    //     // Kiểm tra data trả về
    //     $this->assertEquals($this->category['name'], $category->name);
    //     $this->assertEquals($this->category['description'], $category->description);
    //     // Kiểm tra dữ liệu có tồn tại trong cơ sở dữ liệu hay không
    //     $this->assertDatabaseHas('categories', $this->category);
    // }

    public function testUpdate()
    {
       // Tạo dữ liệu mẫu
        $category = Category::factory()->create();
        $newCategory = $this->categoryRepository->update($this->category, $category->id);
        // Kiểm tra dữ liệu trả về
        $this->assertInstanceOf(Category::class, $newCategory);
        $this->assertEquals($newCategory->name, $this->category['name']);
        $this->assertEquals($newCategory->description, $this->category['description']);
        // Kiểm tra xem cơ sở dữ liệu đã được cập nhập hay chưa
        $this->assertDatabaseHas('categories', $this->category);
    }
}
