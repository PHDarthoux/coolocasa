<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Offer;
use App\Repository\OfferRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Offer>
 *
 * @method        Offer|Proxy                     create(array|callable $attributes = [])
 * @method static Offer|Proxy                     createOne(array $attributes = [])
 * @method static Offer|Proxy                     find(object|array|mixed $criteria)
 * @method static Offer|Proxy                     findOrCreate(array $attributes)
 * @method static Offer|Proxy                     first(string $sortedField = 'id')
 * @method static Offer|Proxy                     last(string $sortedField = 'id')
 * @method static Offer|Proxy                     random(array $attributes = [])
 * @method static Offer|Proxy                     randomOrCreate(array $attributes = [])
 * @method static OfferRepository|RepositoryProxy repository()
 * @method static Offer[]|Proxy[]                 all()
 * @method static Offer[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Offer[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Offer[]|Proxy[]                 findBy(array $attributes)
 * @method static Offer[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Offer[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<Offer> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<Offer> createOne(array $attributes = [])
 * @phpstan-method static Proxy<Offer> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<Offer> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<Offer> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<Offer> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<Offer> random(array $attributes = [])
 * @phpstan-method static Proxy<Offer> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<Offer> repository()
 * @phpstan-method static list<Proxy<Offer>> all()
 * @phpstan-method static list<Proxy<Offer>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<Offer>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<Offer>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<Offer>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<Offer>> randomSet(int $number, array $attributes = [])
 */
final class OfferFactory extends ModelFactory
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
        $date = self::faker()->dateTimeBetween(); // a date between -30 years ago, and now
        $date = $date->format('Y-m-d H:i:s');
        $date = new \DateTimeImmutable($date);

        return [
            'content' => self::faker()->text(),
            'title' => self::faker()->words(5, true),
            'user' => UserFactory::random(),
            'createdAt' => $date,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Offer $offer): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Offer::class;
    }
}
