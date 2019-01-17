<?php

namespace ResellerClub\Orders\Domains\Responses;

use Carbon\Carbon;
use ResellerClub\Address;
use ResellerClub\EmailAddress;
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
use ResellerClub\TelephoneNumber;

class GetResponse extends Response
{
    /**
     * Ignored the following API response values, as they don't look like they're suppose to be returned;
     * productkey
     * classname
     * addons
     */

    /**
     * Get the order ID parameter.
     * This doesn't appear in the API documentation but does appear in the API response.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return int
     */
    public function entityId(): int
    {
        return (int) $this->entityid;
    }

    /**
     * Get the order ID parameter.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return OrderStatus
     */
    public function currentOrderStatus(): OrderStatus
    {
        return new OrderStatus(
            (string) $this->currentstatus
        );
    }

    /**
     * Gets the order registry status.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return LockedOrHoldStatus
     */
    public function lockedOrHoldStatus(): LockedOrHoldStatus
    {
        // If the value is not set then force it to be an empty array, to match the api response.
        if (! $this->domainstatus) {
            $this->domainstatus = [];
        }

        // Force the property to be an array to match the api response.
        if (! is_array($this->domainstatus)) {
            $this->domainstatus = [$this->domainstatus];
        }

        return new LockedOrHoldStatus(
            (string) $this->domainstatus[0]
        );
    }

    /**
     * Gets the product category.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return NamedServers
     */
    public function namedServers(): NamedServers
    {
        return new NamedServers(
            (int) $this->noOfNameServers,
            (string) $this->ns1,
            (string) $this->ns2,
            (string) $this->cns[0]
        );
    }

    /**
     * Gets the registrant contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return Contact
     */
    public function registrantContact(): Contact
    {
        return new Contact(
            $id = (int) $this->registrantcontact['contactid'],
            $customerId = (int) $this->registrantcontact['customerid'],
            $parentId = (string) $this->registrantcontact['parentkey'],
            $name = (string) $this->registrantcontact['name'],
            new EmailAddress(
                $email = (string) $this->registrantcontact['emailaddr']
            ),
            new TelephoneNumber(
                $diallingCode = (string) $this->registrantcontact['telnocc'],
                $number = (string) $this->registrantcontact['telno']
            ),
            new Address(
                $company = (string) $this->registrantcontact['company'],
                $addressLine1 = (string) $this->registrantcontact['address1'],
                $addressLine2 = (string) $this->registrantcontact['address2'],
                $addressLine3 = (string) $this->registrantcontact['address3'],
                $city = (string) $this->registrantcontact['city'],
                $county = (string) $this->registrantcontact['state'],
                $country = (string) $this->registrantcontact['country'],
                $postCode = (string) $this->registrantcontact['zip']
            )
        );
    }

    /**
     * Gets the admin contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return Contact
     */
    public function adminContact(): Contact
    {
        return new Contact(
            $id = (int) $this->admincontact['contactid'],
            $customerId = (int) $this->admincontact['customerid'],
            $parentId = (string) $this->admincontact['parentkey'],
            $name = (string) $this->admincontact['name'],
            new EmailAddress(
                $email = (string) $this->admincontact['emailaddr']
            ),
            new TelephoneNumber(
                $diallingCode = (string) $this->admincontact['telnocc'],
                $number = (string) $this->admincontact['telno']
            ),
            new Address(
                $company = (string) $this->admincontact['company'],
                $addressLine1 = (string) $this->admincontact['address1'],
                $addressLine2 = (string) $this->admincontact['address2'],
                $addressLine3 = (string) $this->admincontact['address3'],
                $city = (string) $this->admincontact['city'],
                $county = (string) $this->admincontact['state'],
                $country = (string) $this->admincontact['country'],
                $postCode = (string) $this->admincontact['zip']
            )
        );
    }

    /**
     * Gets the technical contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return Contact
     */
    public function technicalContact(): Contact
    {
        return new Contact(
            $id = (int) $this->techcontact['contactid'],
            $customerId = (int) $this->techcontact['customerid'],
            $parentId = (string) $this->techcontact['parentkey'],
            $name = (string) $this->techcontact['name'],
            new EmailAddress(
                $email = (string) $this->techcontact['emailaddr']
            ),
            new TelephoneNumber(
                $diallingCode = (string) $this->techcontact['telnocc'],
                $number = (string) $this->techcontact['telno']
            ),
            new Address(
                $company = (string) $this->techcontact['company'],
                $addressLine1 = (string) $this->techcontact['address1'],
                $addressLine2 = (string) $this->techcontact['address2'],
                $addressLine3 = (string) $this->techcontact['address3'],
                $city = (string) $this->techcontact['city'],
                $county = (string) $this->techcontact['state'],
                $country = (string) $this->techcontact['country'],
                $postCode = (string) $this->techcontact['zip']
            )
        );
    }

    /**
     * Gets the billing contact information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return Contact
     */
    public function billingContact(): Contact
    {
        return new Contact(
            $id = $this->billingcontact['contactid'],
            $customerId = $this->billingcontact['customerid'],
            $parentId = $this->billingcontact['parentkey'],
            $name = $this->billingcontact['name'],
            new EmailAddress(
                $email = $this->billingcontact['emailaddr']
            ),
            new TelephoneNumber(
                $diallingCode = $this->billingcontact['telnocc'],
                $number = $this->billingcontact['telno']
            ),
            new Address(
                $company = $this->billingcontact['company'],
                $addressLine1 = $this->billingcontact['address1'],
                $addressLine2 = $this->billingcontact['address2'],
                $addressLine3 = $this->billingcontact['address3'],
                $city = $this->billingcontact['city'],
                $county = $this->billingcontact['state'],
                $country = $this->billingcontact['country'],
                $postCode = $this->billingcontact['zip']
            )
        );
    }

    /**
     * Gets the GDPR protection information.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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
     * @see https://manage.resellerclub.com/kb/node/1755
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

    /**
     * Gets whether this domain is to recur.
     * This doesn't appear in the API documentation but does appear in the API response.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return bool
     */
    public function recurring(): bool
    {
        return (bool) $this->recurring;
    }

    /**
     * Get the cost to the customer, there is no currency returned with the API call.
     * This doesn't appear in the API documentation but does appear in the API response.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return float
     */
    public function customerCost(): float
    {
        return (float) $this->customercost;
    }

    /**
     * Get period in which a customer can claim their money back.
     * This doesn't appear in the API documentation but does appear in the API response.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return int
     */
    public function moneyBackPeriod(): int
    {
        return (int) $this->moneybackperiod;
    }

    /**
     * Get the reseller's cost to the, there is no currency returned with the API call.
     * This doesn't appear in the API documentation but does appear in the API response.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return float
     */
    public function resellerCost(): float
    {
        return (float) $this->resellercost;
    }

    /**
     * Gets the jump conditions, currently not in the ResellerClub's API documentation.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return array
     */
    public function jumpConditions(): array
    {
        return (array) $this->jumpConditions;
    }

    /**
     * Gets if the order is paused, currently not in the ResellerClub's API documentation.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return bool
     */
    public function paused(): bool
    {
        return (bool) $this->paused;
    }

    /**
     * Gets the 'eaqid', currently not in the ResellerClub's API documentation.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return int
     */
    public function eaqId(): int
    {
        return (int) $this->eaqid;
    }

    /**
     * Gets the entity type id, currently not in the ResellerClub's API documentation.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return int
     */
    public function entityTypeId(): int
    {
        return (int) $this->entitytypeid;
    }

    /**
     * Gets if the action is completed, currently not in the ResellerClub's API documentation.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return string
     */
    public function actionCompleted(): string
    {
        return (string) $this->actioncompleted;
    }

    /**
     * Gets the duration to attempt auto renewals, currently not in the ResellerClub's API documentation.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return int
     */
    public function autoRenewAttemptDuration(): int
    {
        return (int) $this->autoRenewAttemptDuration;
    }

    /**
     * Gets the auto renewal term type, currently not in the ResellerClub's API documentation.
     *
     * @see https://manage.resellerclub.com/kb/node/770
     * @see https://manage.resellerclub.com/kb/node/1755
     *
     * @return string
     */
    public function autoRenewTermType(): string
    {
        return (string) $this->autoRenewTermType;
    }
}
