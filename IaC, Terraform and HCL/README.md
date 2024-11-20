# IaC, Terraform and HCL Notes

## Tools

- Orchestration tools provision and manage infrastructure. Examples: Terraform, CloudFormation (AWS), ARM templates (Microsoft) and Google Cloud Deployment Manager.
- Configuration management tools manage the running configurations and software of infrastructure. Examples: Ansible, Salt and Chef.

## Language Types

- Imperative - specific steps are defined, like resources in Chef.
- Declarative - defines the end result, not the specifics of how to get there, like Terraform.

## Types of Infrastructure

- Mutable - can be modified and updated on the spot. Configuration does not require reprovisioning.
- Immutable - all configuration is done before provisioning.

## Terraform

- Desired state system.
- Made up of:
  - Terraform Core - reads and parses the HCL. Communicates with plugins using remote procedural calls. Written in Go.
  - Plugins - defines services, such as to make API calls or authenticate to different providers.
    - Providers are plugins that interact with cloud platform (or machine) APIs.

### Terraform Processes

#### Overarching Process

- Infrastructure is declared in HCL or JSON -> Terraform Core -> Providers -> Changes made to IT resources

#### Deployment Process

- init -> plan -> apply -> destroy
- init - initialises the backend, which is where the state file lives.

### Terraform State File

- A .tfstate file is created when terraform is initialised, which holds the current state. The 'terraform plan' command compares the current state with the desired state and creates the execution plan based on this.
- Written in JSON.

### Workspaces

- Workspaces are used to isolate different environment configurations (and their state files) within a single configuration/directory.
- Manipulated through the CLI
