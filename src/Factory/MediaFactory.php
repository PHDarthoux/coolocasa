<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Media;
use App\Repository\MediaRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Media>
 *
 * @method        Media|Proxy                     create(array|callable $attributes = [])
 * @method static Media|Proxy                     createOne(array $attributes = [])
 * @method static Media|Proxy                     find(object|array|mixed $criteria)
 * @method static Media|Proxy                     findOrCreate(array $attributes)
 * @method static Media|Proxy                     first(string $sortedField = 'id')
 * @method static Media|Proxy                     last(string $sortedField = 'id')
 * @method static Media|Proxy                     random(array $attributes = [])
 * @method static Media|Proxy                     randomOrCreate(array $attributes = [])
 * @method static MediaRepository|RepositoryProxy repository()
 * @method static Media[]|Proxy[]                 all()
 * @method static Media[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Media[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Media[]|Proxy[]                 findBy(array $attributes)
 * @method static Media[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Media[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<Media> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<Media> createOne(array $attributes = [])
 * @phpstan-method static Proxy<Media> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<Media> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<Media> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<Media> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<Media> random(array $attributes = [])
 * @phpstan-method static Proxy<Media> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<Media> repository()
 * @phpstan-method static list<Proxy<Media>> all()
 * @phpstan-method static list<Proxy<Media>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<Media>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<Media>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<Media>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<Media>> randomSet(int $number, array $attributes = [])
 */
final class MediaFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->randomElement(['appartement', 'maison', 'bateau', 'chalet', 'ferme', 'studio', 'villa']),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Media $media): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Media::class;
    }
}
