<?php

namespace App\GraphqQL\Mutation;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class ProductMutation implements MutationInterface,AliasedInterface
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function createProduct(Argument $argument)
    {
        $input = $argument['input'];
        $user = (new Product())->setName($input['name']);
        $this->productRepository->save($user);

        return $user;
    }

    public static function getAliases(): array
    {
        return [
            'createProduct' => 'create_product'
        ];
    }
}
