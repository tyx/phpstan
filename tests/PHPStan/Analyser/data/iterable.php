<?php // lint >= 7.1

namespace Iterables;

class Foo
{

	/**
	 * @var iterable
	 */
	private $iterableProperty;

	/**
	 * @param iterable $iterableWithIterableTypehint
	 * @param Bar[] $iterableWithConcreteTypehint
	 * @param iterable $arrayWithIterableTypehint
	 * @param Bar[]|Collection $unionIterableType
	 * @param Foo[]|Bar[]|Collection $mixedUnionIterableType
	 */
	public function doFoo(
		iterable $iterableWithoutTypehint,
		iterable $iterableWithIterableTypehint,
		iterable $iterableWithConcreteTypehint,
		array $arrayWithIterableTypehint,
		array $unionIterableType,
		array $mixedUnionIterableType,
		$iterableSpecifiedLater
	)
	{
		if (!is_iterable($iterableSpecifiedLater)) {
			return;
		}

		foreach ($iterableWithIterableTypehint as $mixed) {
			foreach ($iterableWithConcreteTypehint as $bar) {
				foreach ($this->doBaz() as $baz) {
					foreach ($unionIterableType as $unionBar) {
						foreach ($mixedUnionIterableType as $mixedBar) {
							die;
						}
					}
				}
			}
		}
	}

	/**
	 * @return iterable
	 */
	public function doBar(): iterable
	{

	}

	/**
	 * @return Baz[]
	 */
	public function doBaz(): iterable
	{

	}

}
