<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id",
        "content"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * renvoie le user ayant posté le commentaire et ses atributs
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

