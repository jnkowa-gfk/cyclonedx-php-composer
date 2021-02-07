<?php

/*
 * This file is part of the CycloneDX PHP Composer Plugin.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * SPDX-License-Identifier: Apache-2.0
 * Copyright (c) Steve Springett. All Rights Reserved.
 */

namespace CycloneDX\Models;

use UnexpectedValueException;

/**
 * Class Component.
 *
 * @author nscuro
 */
class Component
{
    /**
     * Name.
     *
     * The name of the component. This will often be a shortened, single name
     * of the component.
     *
     * Examples: commons-lang3 and jquery
     *
     * @var string
     */
    private $name;

    /**
     * Group.
     *
     * The grouping name or identifier. This will often be a shortened, single
     * name of the company or project that produced the component, or the source package or
     * domain name.
     * Whitespace and special characters should be avoided.
     *
     * Examples include: apache, org.apache.commons, and apache.org.
     *
     * @var string|null
     */
    private $group;

    /**
     * Type.
     *
     * Specifies the type of component. For software components, classify as application if no more
     * specific appropriate classification is available or cannot be determined for the component.
     * Valid choices are: application, framework, library, operating-system, device, or file.
     *
     * Refer to the {@link https://cyclonedx.org/schema/bom/1.1 bom:classification documentation}
     * for information describing each one.
     *
     * @var string|null
     */
    private $type;

    /**
     * Description.
     *
     * Specifies a description for the component.
     *
     * @var string|null
     */
    private $description;

    /**
     * Licences.
     *
     * @var License[]
     */
    private $licenses;

    /**
     * Hashes.
     *
     * Specifies the file hashes of the component.
     *
     * @var string[]
     */
    private $hashes;

    /**
     * Version.
     *
     * The component version. The version should ideally comply with semantic versioning
     * but is not enforced.
     *
     * @var string
     */
    private $version;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getGroup(): ?string
    {
        return $this->group;
    }

    public function setGroup(?string $group): void
    {
        $this->group = $group;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type For a ist of Valid values see this
     *                          {@link https://cyclonedx.org/schema/bom/1.1 XSD} for `classification`.
     *
     * @throws UnexpectedValueException
     */
    public function setType(?string $type): void
    {
        if (!in_array($type, ['application', 'framework', 'library', 'operating-system', 'file'])) {
            throw new UnexpectedValueException("Invalid value: {$type}");
        }
        $this->type = $type;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return License[]
     */
    public function getLicenses(): array
    {
        return $this->licenses;
    }

    /**
     * @param License[] $licenses
     */
    public function setLicenses(array $licenses): void
    {
        $this->licenses = $licenses;
    }

    /**
     * @return string[]
     */
    public function getHashes(): array
    {
        /* @TODO add validation ala XSD's `hashType` */
        return $this->hashes;
    }

    /**
     * @param string[] $hashes
     */
    public function setHashes(array $hashes): void
    {
        $this->hashes = $hashes;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * Package URL.
     *
     * Specifies the package-url (PURL).
     * The purl, if specified, must be valid and conform to the specification
     * defined at: {@linnk https://github.com/package-url/purl-spec}
     */
    public function getPackageUrl(): string
    {
        return 'pkg:composer/'.
            ($this->group ? "{$this->group}/" : '').
            "{$this->name}@{$this->version}"
            ;
    }

    /**
     * Component constructor.
     *
     * @uses \CycloneDX\Models\Component::setName()
     * @uses \CycloneDX\Models\Component::setVersion()
     */
    public function __construct(string $name, string $version)
    {
        $this->setName($name);
        $this->setVersion($version);
    }
}