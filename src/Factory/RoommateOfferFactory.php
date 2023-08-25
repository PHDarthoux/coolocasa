<?php

namespace App\Factory;

use App\Entity\RoommateOffer;
use App\Repository\RoommateOfferRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<RoommateOffer>
 *
 * @method        RoommateOffer|Proxy                     create(array|callable $attributes = [])
 * @method static RoommateOffer|Proxy                     createOne(array $attributes = [])
 * @method static RoommateOffer|Proxy                     find(object|array|mixed $criteria)
 * @method static RoommateOffer|Proxy                     findOrCreate(array $attributes)
 * @method static RoommateOffer|Proxy                     first(string $sortedField = 'id')
 * @method static RoommateOffer|Proxy                     last(string $sortedField = 'id')
 * @method static RoommateOffer|Proxy                     random(array $attributes = [])
 * @method static RoommateOffer|Proxy                     randomOrCreate(array $attributes = [])
 * @method static RoommateOfferRepository|RepositoryProxy repository()
 * @method static RoommateOffer[]|Proxy[]                 all()
 * @method static RoommateOffer[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static RoommateOffer[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static RoommateOffer[]|Proxy[]                 findBy(array $attributes)
 * @method static RoommateOffer[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static RoommateOffer[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<RoommateOffer> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<RoommateOffer> createOne(array $attributes = [])
 * @phpstan-method static Proxy<RoommateOffer> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<RoommateOffer> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<RoommateOffer> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<RoommateOffer> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<RoommateOffer> random(array $attributes = [])
 * @phpstan-method static Proxy<RoommateOffer> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<RoommateOffer> repository()
 * @phpstan-method static list<Proxy<RoommateOffer>> all()
 * @phpstan-method static list<Proxy<RoommateOffer>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<RoommateOffer>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<RoommateOffer>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<RoommateOffer>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<RoommateOffer>> randomSet(int $number, array $attributes = [])
 */
final class RoommateOfferFactory extends ModelFactory
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
            'addressLine1' => self::faker()->streetAddress(),
            'addressLine2' => self::faker()->secondaryAddress(),
            'animalAccepted' => self::faker()->boolean(),
            'area' => self::faker()->numberBetween(20, 1000),
            'availabilityDate' => self::faker()->dateTime(),
            'city' => self::faker()->city(),
            'disponibility' => self::faker()->dateTime(),
            'furnished' => self::faker()->boolean(),
            'handicapAccess' => self::faker()->boolean(),
            'lodgingType' => LodgingTypeFactory::random(),
            'postalCode' => self::faker()->postcode(),
            'price' => self::faker()->numberBetween(100, 1000),
            'smokerAccepted' => self::faker()->boolean(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(RoommateOffer $roommateOffer): void {})
        ;
    }

    protected static function getClass(): string
    {
        return RoommateOffer::class;
    }
}
