# Understanding the Two Pointers Technique

The **Two Pointers** technique is a fundamental algorithmic pattern used to solve problems involving arrays, strings, or linked lists by using **two indexes (or pointers)** that traverse the data structure at different speeds or directions.

It helps optimize problems that might otherwise require nested loops — often reducing time complexity from **O(n²)** to **O(n)**.

---

## 📖 Table of Contents

1. [Summary](#summary)
2. [What Is the Two Pointers Technique?](#what-is-the-two-pointers-technique)
3. [When to Use It](#when-to-use-it)
4. [Common Patterns](#common-patterns)

   * [Opposite Direction Pointers](#opposite-direction-pointers)
   * [Same Direction (Fast & Slow)](#same-direction-fast--slow)
5. [Example 1 — Pair Sum (Opposite Direction)](#example-1--pair-sum-opposite-direction)
6. [Example 2 — Remove Duplicates (Same Direction)](#example-2--remove-duplicates-same-direction)
7. [Advantages](#advantages)
8. [Limitations](#limitations)
9. [Summary Table](#summary-table)
10. [Related Topics](#related-topics)

---

## Summary

Two pointers are variables that reference positions (indexes) in a collection.
By moving them strategically, we can compare or process data efficiently without revisiting elements.

| Concept                    | Description                                  |
| -------------------------- | -------------------------------------------- |
| **Goal**                   | Optimize loops that involve pair comparisons |
| **Data Structures**        | Arrays, strings, linked lists                |
| **Complexity Improvement** | O(n²) → O(n)                                 |
| **Pointer Directions**     | Same or opposite                             |

---

## What Is the Two Pointers Technique?

Imagine you need to compare or process two elements in an array at a time.
Instead of looping twice, you can **use two variables** (`left` and `right`) that move towards or along the array.

```text
[1, 2, 3, 4, 5]
 ↑           ↑
left       right
```

As the algorithm runs, you adjust the positions depending on your condition.

---

## When to Use It

Use **Two Pointers** when:

* You need to **find pairs** or **triplets** in a sorted array.
* You’re working with **linked lists** (detecting cycles, middle node).
* You need to **partition data** or **remove duplicates**.
* You’re optimizing **sliding window problems**.

---

## Common Patterns

### Opposite Direction Pointers

* Typically used with **sorted arrays**.
* One pointer starts from the **beginning**, the other from the **end**.
* You move them based on conditions (e.g., sum comparison).

### Same Direction (Fast & Slow)

* Both pointers start at the same position.
* One moves faster than the other.
* Used to detect cycles or track differences between elements.

---

## Example 1 — Pair Sum (Opposite Direction)

Find two numbers in a sorted array that sum to a target.

```php
function pairSum(array $nums, int $target): ?array {
    $left = 0;
    $right = count($nums) - 1;

    while ($left < $right) {
        $sum = $nums[$left] + $nums[$right];

        if ($sum === $target) {
            return [$nums[$left], $nums[$right]];
        } elseif ($sum < $target) {
            $left++;
        } else {
            $right--;
        }
    }

    return null; // No pair found
}

print_r(pairSum([1, 2, 3, 4, 6], 6));
// Output: [2, 4]
```

**Time Complexity:** O(n)
**Space Complexity:** O(1)

---

## Example 2 — Remove Duplicates (Same Direction)

Remove duplicates from a sorted array **in-place**.

```php
function removeDuplicates(array &$nums): int {
    if (count($nums) === 0) return 0;

    $slow = 0;

    for ($fast = 1; $fast < count($nums); $fast++) {
        if ($nums[$fast] !== $nums[$slow]) {
            $slow++;
            $nums[$slow] = $nums[$fast];
        }
    }

    return $slow + 1; // New length
}

$nums = [1, 1, 2, 3, 3];
$newLength = removeDuplicates($nums);
print_r(array_slice($nums, 0, $newLength));
// Output: [1, 2, 3]
```

**Time Complexity:** O(n)
**Space Complexity:** O(1)

---

## Advantages

Reduces complexity dramatically.
Minimal extra space required.
Clean and efficient for sequential data processing.

---

## Limitations

Not ideal for **unsorted arrays** (unless sorted first).
Requires **clear traversal logic** — can be tricky to debug.
Usually limited to problems with **linear structure** (arrays, linked lists).

---

## Summary Table

| Pattern                  | Direction   | Use Case                    | Example           |
| ------------------------ | ----------- | --------------------------- | ----------------- |
| **Opposite Pointers**    | Start ↔ End | Pair Sum, Palindromes       | [1, 2, 3, 4]      |
| **Fast & Slow Pointers** | Same →      | Cycle detection, Duplicates | Linked lists      |
| **Sliding Window**       | Same →      | Subarray problems           | Longest substring |

---

## 🔗 Related Topics

* [Sliding Window Technique](#)
* [Binary Search](#)
* [Linked List Algorithms](#)
* [Sorting and Searching](#)