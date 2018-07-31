<?php

namespace Jisbell347\LostPaws;
use Ramsey\Uuid\Uuid;

/**
 * Animal section of the lostpaws.com site. After logging in, a user can post information about the animal including: status, color, name, species, gender and location as well as upload an image of the animal.
 *
 * @author  Jude Baca-Miller <jmiller156@cnm.edu>
 **/

class Animal {
	use ValidateUuid;
	use ValidateDate;

	/**
	 * id for animal: this is the primary key
	 * @var Uuid $animalId
	 **/
	private $animalId;
	/**
	 * profileId for this animal; this is the foreign key
	 * @var Uuid $animalProfileId
	 **/
	private $animalProfileId;
	/**
	 * color of the animal
	 * @var string $animalColor
	 **/
	private $animalColor;
	/**
	 * date the animal was last seen
	 * @var \DateTime $animalDate
	 **/
	private $animalDate;
	/**
	 * description of the animal
	 * @var string $animalDescription
	 **/
	private $animalDescription;
	/**
	 * specify if animal is male or female
	 * @var string $animalGender
	 **/
	private $animalGender;
	/**link to animal picture
	 * @var string $animalImageUrl
	 **/
	private $animalImageUrl;
	/**
	 * location of the last place the animal was seen
	 * @var string $animalLocation
	 **/
	private $animalLocation;
	/**
	 * The animal's name
	 * @var string $animalName
	 **/
	private $animalName;
	/**
	 * Is the animal a cat or dog
	 * @var string $animalSpecies
	 **/
	private $animalSpecies;
	/**
	 * is the animal lost, found, or reunited
	 * @var string $animalStatus
	 **/
	private $animalStatus;

	/**
	 * Animal constructor.
	 * @param Uuid $newAnimalId
	 * @param Uuid $newAnimalProfileId
	 * @param \DateTime| $newAnimalDate
	 * @param string $animalDescription
	 * @param string $newAnimalGender
	 * @param string $newAnimalImageUrl
	 * @param string $newAnimalLocation
	 * @param string $newAnimalName
	 * @param string $newAnimalSpecies
	 * @param string $newAnimalStatus
	 **/
	public function  __construct(Uuid $newAnimalId, Uuid $newAnimalProfileId, $newAnimalDate, string $animalDescription, string $newAnimalGender, string $newAnimalImageUrl, string $newAnimalLocation, string $newAnimalName, string $newAnimalSpecies, string $newAnimalStatus) {
		try {
			$this->setAnimalId($newAnimalId);
			$this->setAnimalProfileId($newAnimalProfileId);
			$this->setAnimalDate($newAnimalDate);
			$this->setAnimalDescription($animalDescription);
			$this->setAnimalGender($newAnimalGender);
			$this->setAnimalImageUrl($newAnimalImageUrl);
			$this->setAnimalLocation($newAnimalLocation);
			$this->setAnimalName($newAnimalName);
			$this->setAnimalSpecies($newAnimalSpecies);
			$this->setAnimalStatus($newAnimalStatus);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for animal id
	 *
	 * @return Uuid value of animal id
	 */
	public function getAnimalId(): Uuid {
		return($this->animalId);
	}

	/**
	 * mutator method for animal id
	 *
	 * @param Uuid| string $newAnimalId value of new animal id
	 * @throws \rangeException if $newAnimalId is not positive
	 * @throws \TypeError if animal id is not valid
	 */
	public function setAnimalId($newAnimalId): void {
		try {
			$uuid = self::validateUuid($newAnimalId);
		} catch( \InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType =get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the animal id
		$this->animalId = $uuid;
	}

	/**
	 * accessor method for animal profile id
	 *
	 * @return Uuid
	 */
	public function getAnimalProfileId(): Uuid {
		return ($this->animalProfileId);
	}

	public function setAnimalProfileId($newAnimalProfileId): void {
		try{
			$uuid = self::validateUuid($newAnimalProfileId);
		} catch( \InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType =get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the animal id
		$this->animalProfileId = $uuid;
	}




}