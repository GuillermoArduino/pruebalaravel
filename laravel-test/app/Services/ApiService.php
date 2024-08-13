<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Entity;
use App\Models\Category;

class ApiService
{
    public function fetchAndStoreEntities()
    {
        $response = Http::get('https://web.archive.org/web/20240403172734/https://api.publicapis.org/entries');
        $entries = $response->json()['entries'];

        foreach ($entries as $entry) {
            if (in_array($entry['Category'], ['Animals', 'Security'])) {
                $category = Category::firstWhere('category', $entry['Category']);
                Entity::create([
                    'api' => $entry['API'],
                    'description' => $entry['Description'],
                    'link' => $entry['Link'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
