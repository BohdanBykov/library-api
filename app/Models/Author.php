namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // ... other attributes ...

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}