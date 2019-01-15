<?php

namespace ResellerClub\Orders\Domains\Responses;

use Carbon\Carbon;
use ResellerClub\Orders\Contact;
use ResellerClub\Orders\Domains\DelegationSigner;
use ResellerClub\Orders\Domains\NamedServers;
use ResellerClub\Orders\Domains\PrivacyProtection;
use ResellerClub\Orders\Domains\RegistrantContactVerification;
use ResellerClub\Orders\Domains\RegistryStatus;
use ResellerClub\Orders\GdprProtection;
use ResellerClub\Orders\LockedOrHoldStatus;
use ResellerClub\Orders\OrderStatus;
use ResellerClub\Response;

class GetResponse extends Response
{
    /**
     * Get the order ID parameter.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return int
     */
    public function orderId(): int
    {
        return (int) $this->orderid;
    }

    /**
     * Get the description of the order.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return string
     */
    public function description(): string
    {
        return (string) $this->description;
    }

    /**
     * Get the domain name associated to this order.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return string
     */
    public function domain(): string
    {
        return (string) $this->domainname;
    }

    /**
     * Gets the order's current status.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return OrderStatus
     */
    public function currentOrderStatus(): OrderStatus
    {
        return new OrderStatus(
            (string)$this->currentstatus
        );
    }

    /**
     * Gets the order registry status.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return RegistryStatus
     */
    public function registryStatus(): RegistryStatus
    {
        return new RegistryStatus(
            (string) $this->orderstatus
        );
    }

    /**
     * Gets whether the order is locked or on hold.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return LockedOrHoldStatus
     */
    public function lockedOrHoldStatus(): LockedOrHoldStatus
    {
        return new LockedOrHoldStatus(
            (string) $this->domainstatus
        );
    }

    /**
     * Gets the product category.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return string
     */
    public function productCategory(): string
    {
        return (string) $this->productcategory;
    }

    /**
     * Gets the product id.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return string
     */
    public function productId(): string
    {
        return (string) $this->productkey;
    }

    /**
     * Date the order was created with the registry.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return Carbon
     */
    public function registryDate(): Carbon
    {
        return Carbon::createFromTimestamp($this->creationtime);
    }

    /**
     * Date the order will expire with the registry.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return Carbon
     */
    public function registryExpiryDate(): Carbon
    {
        return Carbon::createFromTimestamp($this->endtime);
    }

    /**
     * Get the customer ID associated with the domain order.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return int
     */
    public function customerId(): int
    {
        return (int) $this->customerid;
    }

    /**
     * Gets if the order is an immediate Reseller account.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return bool
     */
    public function isImmediateReseller(): bool
    {
        return (bool) $this->isImmediateReseller;
    }

    /**
     * Gets the Reseller's parent ID.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return string
     */
    public function resellerParentId(): string
    {
        return (string) $this->parentkey;
    }

    /**
     * Is privacy protection allowed for this domain order?
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return bool
     */
    public function isPrivacyProtectionAllowed(): bool
    {
        return (bool) $this->privacyprotectedallowed;
    }

    /**
     * Does the domain order have privacy protection enabled?
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return bool
     */
    public function isPrivacyProtected(): bool
    {
        return (bool) $this->isprivacyprotected;
    }

    /**
     * Can the domain order be deleted?
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return bool
     */
    public function isDeletionAllowed(): bool
    {
        return (bool) $this->allowdeletion;
    }

    /**
     * Is the order suspended when it expires?
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return bool
     */
    public function isSuspendedUponExpiry(): bool
    {
        return (bool) $this->isOrderSuspendedUponExpiry;
    }

    /**
     * Has the order been suspended by the reseller parent?
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return bool
     */
    public function isSuspendedByParent(): bool
    {
        return (bool) $this->orderSuspendedByParent;
    }

    /**
     * Get the domain secret.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return string
     */
    public function domainSecret(): string
    {
        return (string) $this->domsecret;
    }

    /**
     * Get the named servers information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return NamedServers
     */
    public function namedServers(): NamedServers
    {
        return new NamedServers(
            (int) $this->noOfNameServers,
            (string) $this->ns1,
            (string) $this->ns2,
            (string) $this->cns
        );
    }

    /**
     * Gets the registrant contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return Contact
     */
    public function registrantContact(): Contact
    {
        return new Contact(
            (int) $this->registrantcontactid,
            (string) $this->registrantcontact
        );
    }

    /**
     * Gets the admin contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return Contact
     */
    public function adminContact(): Contact
    {
        return new Contact(
            (int) $this->admincontactid,
            (string) $this->admincontact
        );
    }

    /**
     * Gets the technical contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return Contact
     */
    public function technicalContact(): Contact
    {
        return new Contact(
            (int) $this->techcontactid,
            (string) $this->techcontact
        );
    }

    /**
     * Gets the billing contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return Contact
     */
    public function billingContact(): Contact
    {
        return new Contact(
            (int) $this->billingcontactid,
            (string) $this->billingcontact
        );
    }

    /**
     * Gets the GDPR protection information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return GDPRProtection
     */
    public function gdprProtection(): GdprProtection
    {
        return new GdprProtection(
            (bool) $this->gdpr['enabled'],
            (bool) $this->gdpr['eligible']
        );
    }

    /**
     * Gets the registrant contact verification.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return RegistrantContactVerification
     */
    public function registrantContactVerification(): RegistrantContactVerification
    {
        return new RegistrantContactVerification(
            (string) $this->raaVerificationStatus,
            (string) $this->raaVerificationStartTime
        );
    }

    /**
     * Gets the privacy protection information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return PrivacyProtection
     */
    public function privacyProtection(): PrivacyProtection
    {
        return new PrivacyProtection(
            (string) $this->privacyprotectendtime,
            (string) $this->{'privacy-registrantcontact'},
            (string) $this->{'privacy-admincontact'},
            (string) $this->{'privacy-billingcontact'}
        );
    }

    /**
     * Gets the delegation signer record details.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     *
     * @return DelegationSigner
     */
    public function delegationSigner(): DelegationSigner
    {
        return new DelegationSigner(
            (string) $this->dnssec['keytag'],
            (string) $this->dnssec['algorithm'],
            (string) $this->dnssec['digest'],
            (string) $this->dnssec['digesttype']
        );
    }
}
