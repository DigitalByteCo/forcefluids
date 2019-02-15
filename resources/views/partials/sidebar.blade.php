<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(!auth()->user()->isCustomer())
                <li>
                    <a href="{{route('pdf.create')}}"><i class="menu-icon fa fa-laptop"></i>New Sales Order</a>
                </li>
                @endif
                @if(auth()->user()->isAdmin())
                <li>
                    <a href="{{route('company.index')}}"><i class="menu-icon fa fa-laptop"></i>Company</a>
                </li>
                <li>
                    <a href="{{route('customer.index')}}"><i class="menu-icon fa fa-laptop"></i>Customer</a>
                </li>
                @endif
                @if(auth()->user()->isCustomer() || auth()->user()->isSales())
                <li>
                    <a href="{{route('job.index')}}"><i class="menu-icon fa fa-laptop"></i>Job</a>
                </li>
                @endif
                @if(auth()->user()->isCustomer())
                <li>
                    <a href="{{route('event.create')}}"><i class="menu-icon fa fa-laptop"></i>Event</a>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
