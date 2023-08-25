<?php

namespace App\Factory;

use App\Entity\RentalSearch;
use App\Repository\RentalSearchRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<RentalSearch>
 *
 * @method        RentalSearch|Proxy                     create(array|callable $attributes = [])
 * @method static RentalSearch|Proxy                     createOne(array $attributes = [])
 * @method static RentalSearch|Proxy                     find(object|array|mixed $criteria)
 * @method static RentalSearch|Proxy                     findOrCreate(array $attributes)
 * @method static RentalSearch|Proxy                     first(string $sortedField = 'id')
 * @method static RentalSearch|Proxy                     last(string $sortedField = 'id')
 * @method static RentalSearch|Proxy                     random(array $attributes = [])
 * @method static RentalSearch|Proxy                     randomOrCreate(array $attributes = [])
 * @method static RentalSearchRepository|RepositoryProxy repository()
 * @method static RentalSearch[]|Proxy[]                 all()
 * @method static RentalSearch[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static RentalSearch[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static RentalSearch[]|Proxy[]                 findBy(array $attributes)
 * @method static RentalSearch[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static RentalSearch[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<RentalSearch> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<RentalSearch> createOne(array $attributes = [])
 * @phpstan-method static Proxy<RentalSearch> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<RentalSearch> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<RentalSearch> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<RentalSearch> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<RentalSearch> random(array $attributes = [])
 * @phpstan-method static Proxy<RentalSearch> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<RentalSearch> repository()
 * @phpstan-method static list<Proxy<RentalSearch>> all()
 * @phpstan-method static list<Proxy<RentalSearch>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<RentalSearch>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<RentalSearch>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<RentalSearch>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<RentalSearch>> randomSet(int $number, array $attributes = [])
 */
final class RentalSearchFactory extends ModelFactory
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
            'acceptAnimals' => self::faker()->boolean(),
            'acceptSmoker' => self::faker()->boolean(),
            'centerOfInterest' => self::faker()->words(15, true),
            'desiredCity' => self::faker()->city(),
            'desiredMoveInDate' => self::faker()->dateTime(),
            'hasAnimal' => self::faker()->boolean(),
            'maxBudget' => self::faker()->randomNumber(3),
            'smoker' => self::faker()->boolean(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(RentalSearch $rentalSearch): void {})
        ;
    }

    protected static function getClass(): string
    {
        return RentalSearch::class;
    }
}
