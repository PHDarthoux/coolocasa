<?php

namespace App\Factory;

use App\Entity\LodgingType;
use App\Repository\LodgingTypeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<LodgingType>
 *
 * @method        LodgingType|Proxy                     create(array|callable $attributes = [])
 * @method static LodgingType|Proxy                     createOne(array $attributes = [])
 * @method static LodgingType|Proxy                     find(object|array|mixed $criteria)
 * @method static LodgingType|Proxy                     findOrCreate(array $attributes)
 * @method static LodgingType|Proxy                     first(string $sortedField = 'id')
 * @method static LodgingType|Proxy                     last(string $sortedField = 'id')
 * @method static LodgingType|Proxy                     random(array $attributes = [])
 * @method static LodgingType|Proxy                     randomOrCreate(array $attributes = [])
 * @method static LodgingTypeRepository|RepositoryProxy repository()
 * @method static LodgingType[]|Proxy[]                 all()
 * @method static LodgingType[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static LodgingType[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static LodgingType[]|Proxy[]                 findBy(array $attributes)
 * @method static LodgingType[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static LodgingType[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<LodgingType> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<LodgingType> createOne(array $attributes = [])
 * @phpstan-method static Proxy<LodgingType> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<LodgingType> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<LodgingType> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<LodgingType> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<LodgingType> random(array $attributes = [])
 * @phpstan-method static Proxy<LodgingType> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<LodgingType> repository()
 * @phpstan-method static list<Proxy<LodgingType>> all()
 * @phpstan-method static list<Proxy<LodgingType>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<LodgingType>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<LodgingType>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<LodgingType>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<LodgingType>> randomSet(int $number, array $attributes = [])
 */
final class LodgingTypeFactory extends ModelFactory
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
            'type' => self::faker()->randomNumber(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(LodgingType $lodgingType): void {})
        ;
    }

    protected static function getClass(): string
    {
        return LodgingType::class;
    }
}
