# Proxy

## Purpose

To provide a placeholder object that takes the place of another object. In practice, there are several reasons for doing this:

1. To delay creation of an expensive object until absolutely necessary. (See the RecordVirtualProxy class).

2. To transparently control access to another object. (See the RecordProtectingProxy class)

3. To represent a remote resource on another system. (an example would require a significant amount of code)

## Examples

* Doctrine2 uses proxies to implement framework magic (e.g. lazy initialization) in them, while the user still works with his own entity classes and will never use nor touch the proxies
