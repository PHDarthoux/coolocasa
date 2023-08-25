<?php

namespace App\Factory;

use App\Entity\Gender;
use App\Repository\GenderRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Gender>
 *
 * @method        Gender|Proxy                     create(array|callable $attributes = [])
 * @method static Gender|Proxy                     createOne(array $attributes = [])
 * @method static Gender|Proxy                     find(object|array|mixed $criteria)
 * @method static Gender|Proxy                     findOrCreate(array $attributes)
 * @method static Gender|Proxy                     first(string $sortedField = 'id')
 * @method static Gender|Proxy                     last(string $sortedField = 'id')
 * @method static Gender|Proxy                     random(array $attributes = [])
 * @method static Gender|Proxy                     randomOrCreate(array $attributes = [])
 * @method static GenderRepository|RepositoryProxy repository()
 * @method static Gender[]|Proxy[]                 all()
 * @method static Gender[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Gender[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Gender[]|Proxy[]                 findBy(array $attributes)
 * @method static Gender[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Gender[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<Gender> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<Gender> createOne(array $attributes = [])
 * @phpstan-method static Proxy<Gender> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<Gender> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<Gender> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<Gender> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<Gender> random(array $attributes = [])
 * @phpstan-method static Proxy<Gender> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<Gender> repository()
 * @phpstan-method static list<Proxy<Gender>> all()
 * @phpstan-method static list<Proxy<Gender>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<Gender>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<Gender>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<Gender>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<Gender>> randomSet(int $number, array $attributes = [])
 */
final class GenderFactory extends ModelFactory
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
            // ->afterInstantiate(function(Gender $gender): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Gender::class;
    }
}
