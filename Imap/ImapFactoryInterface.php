<?php

namespace Imap;

use Imap\Mime\Attachment\AttachmentInterface;
use Imap\Mime\EntityInterface;
use Imap\Mime\SMimeSignedEntityInterface;
use Imap\Mime\SMimeEncryptedEntityInterface;

interface ImapFactoryInterface{
	function createPath(ImapInterface $imap,$namePath=null);

	function createMailBox(ImapInterface $imap,MailboxInterface $parent=null,$name=null);

	function createMessage(MailboxInterface $mailbox,$id);

	function createEntityContainer(array $children=[],$fetchNow=false,$type=TYPEMULTIPART,$subType=null,array $typeParameters=[],$disposition=null,array $dispositionParameters=[],$encoding=null,$charset=null,$id=null,$description=null);

	function createImapLeafEntity(MessageInterface $message,$sectionName,$fetchNow=false,$type=TYPETEXT,$subType=null,array $typeParameters=[],$disposition=null,array $dispositionParameters=[],$encoding=ENCBINARY,$charset=null,$id=null,$description=null);

	function createImapAttachment(MessageInterface $message,$sectionName,$fileName,$fetchNow=false,$type=TYPEAPPLICATION,$subType=null,array $typeParameters=[],$disposition=AttachmentInterface::ATTACHMENT_DISPOSITION,array $dispositionParameters=[],$encoding=ENCBINARY,$charset=null,$id=null,$description=null);

	function createSMimeSignedEntity(MessageInterface $message,$sectionName,EntityInterface $contentEntity,$fetchNow=false,$type=TYPEMULTIPART,$subType=SMimeSignedEntityInterface::SUBTYPE,array $typeParameters=[],$disposition=null,array $dispositionParameters=[],$encoding=null,$charset=null,$id=null,$description=null);

	function createSMimeEncryptedEntity(MessageInterface $message,$sectionName,EntityInterface $contentEntity=null,$fetchNow=false,$type=TYPEMULTIPART,$subType=SMimeEncryptedEntityInterface::SUBTYPE,array $typeParameters=[],$disposition=null,array $dispositionParameters=[],$encoding=null,$charset=null,$id=null,$description=null);
}
