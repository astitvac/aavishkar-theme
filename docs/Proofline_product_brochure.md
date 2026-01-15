# LabOS + Proofline: Version Control for Research Knowledge
**Audience:** Researchers, analysts, R&D teams, and knowledge workers who need evidence-backed, auditable work.

## The Big Idea
- **LabOS** is an AI-powered research workspace where you explore, synthesize, and build knowledge — always with citations and provenance.
- **Proofline** is version control for ideas: commit validated Knowledge Cards to Main, branch to explore alternatives, and merge back with a synthesis summary.
- **Knowledge Cards (KCs)** are the atomic unit — each captures a finding, its evidence, and its "so what" in a reusable, citable format.

## Core Features

### Knowledge Cards
- **Structured insights:** Each KC has a title, findings, so_what, citations, and confidence level.
- **Stage-aware:** KCs are tagged by research stage (ideation, lit_review, hypothesis, planning, analysis, writeup).
- **Draft → Commit lifecycle:** Work on drafts, then commit to make them immutable and part of the Proofline.

### Proofline Branching
- **Main branch:** The trusted source of truth — only committed, validated knowledge lives here.
- **Exploration branches:** Branch from any committed KC to explore alternatives without affecting Main.
- **KC Locking:** When you branch from a KC, it's locked on Main to prevent conflicts until you merge or delete the branch.
- **Squash Merge:** When exploration is complete, merge back with a human-written synthesis summary describing what you learned.

### AI-Assisted Research
- **Context-aware chat:** The AI knows your project goal, current stage, and existing KCs.
- **Proactive KC drafting:** The AI suggests Knowledge Cards when insights emerge from conversation.
- **Branch suggestions:** The AI detects when you're exploring alternatives and offers to create a branch.
- **Citation-first:** Every answer includes citations to your documents or committed KCs.

## Who It's For

### Academic Researchers
- Literature review with automatic citation tracking
- Hypothesis exploration on branches without losing prior work
- Publication-ready audit trail from ideation to writeup

### R&D and Deep Tech Teams
- Parallel exploration of risky technical bets
- Clear decision trail for pivots and direction changes
- Reusable knowledge across projects and experiments

### Consulting and Advisory
- Client-specific branches while maintaining firm-wide knowledge
- Evidence-backed deliverables with traceable claims
- Rapid reuse of validated findings across engagements

### Strategy and Product Teams
- Compare strategic options on parallel branches
- Stakeholder-ready summaries with evidence links
- Decision documentation that survives team changes

## Workflow Example

1. **Start a Project:** Define your research goal and select relevant documents.

2. **Explore in Chat:** Ask questions, get answers with citations. The AI drafts KCs when insights emerge.

3. **Commit to Main:** Review and commit KCs to build your trusted knowledge base.

4. **Branch to Explore:** Say "what if we tried a different approach?" — the AI suggests a branch. Your source KC is locked on Main.

5. **Work on Branch:** Create new KCs, explore alternatives, without affecting Main.

6. **Merge When Ready:** Write a synthesis summary describing your exploration. Merge releases the lock.

7. **Deliver with Confidence:** Export from Main — every claim traces back to evidence.

## Branching in Detail

### Creating a Branch
```
User: "I want to explore an alternative hypothesis"
AI: [Suggests branch from KC-123: "Quantum Optimization Approach"]
User: "Yes, create the branch"
→ Branch "explore-classical-alternative" created
→ KC-123 is now locked on Main
```

### While on a Branch
- Create new KCs specific to your exploration
- The locked KC on Main is read-only until merge
- Other team members see the lock indicator

### Merging Back
```
User: "Let's merge this branch"
AI: [Opens merge dialog]
User: Writes synthesis: "Explored classical approach. Found 15% improvement
      in edge cases but 3x complexity. Recommending hybrid approach."
→ Branch merged to Main
→ Lock on KC-123 released
→ Synthesis summary preserved in merge history
```

## Why Proofline is Different

| Traditional Docs | Proofline |
|------------------|-----------|
| Edits overwrite history | Every KC commit is immutable |
| "Who changed what?" is unclear | Full audit trail with author, timestamp, stage |
| Exploration pollutes the record | Branches isolate exploration from truth |
| Claims without evidence | Every KC links to source documents |
| Knowledge trapped in documents | KCs are reusable across projects |

## Trust & Safety

- **Workspace isolation:** Each workspace has its own knowledge graph
- **Branch locking:** Prevents conflicting edits to the same KC
- **Immutable commits:** Committed KCs cannot be modified
- **Audit trail:** Every action is logged with user and timestamp
- **Role-based access:** Project owners control who can commit

## Get Started

1. Create a project with a clear research goal
2. Upload your source documents
3. Start a conversation — ask questions, explore ideas
4. Commit the KCs that capture your validated findings
5. Branch when you want to explore alternatives
6. Merge when exploration is complete

## The Promise

Proofline brings the rigor of version control to knowledge work. Explore boldly on branches, commit only what's validated, and maintain a trusted Main that everyone can rely on. Every insight has provenance. Every decision has a trail. Every claim has evidence. 
